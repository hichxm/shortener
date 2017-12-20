<?php

namespace App\Http\Controllers;

use App\stats;
use App\urls;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * @return mixed
     */
    public function view()
    {
        return View::make('home');
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        function generate_short(){
            $shorted = str_random(5);

            if(urls::where('shorted', $shorted)->count() != 0){
                return generate_short();
            }

            return $shorted;
        }

        $item = urls::where('link', $request->input("url"))->get()->first();

        if(!empty($item)){
            return View::make('home', [
                "shorted" => $item->shorted
            ]);
        }

        $validator = \Validator::make($request->input(), [
           "url" => "required|url"
        ]);

        if (!$validator->fails()) {
            $shorted = generate_short();

            $item = new urls();
            $item->link = $request->input("url");
            $item->shorted = $shorted;
            $item->save();

            stats::where("name", "stats_create_total")
                ->update(["value" => DB::raw("value + 1")]);

            return View::make('home', [
                "shorted" => $shorted
            ]);

        }

        return View::make('home', [
            "error" => "error"
        ]);
    }

    /**
     * @param $shorted
     * @return \Illuminate\Http\RedirectResponse
     */
    public function shorted($shorted)
    {
        $item = urls::where("shorted", $shorted)->get()->first();
        if (!$item){
            return redirect()->route("home.view");
        }

        urls::where('shorted', $shorted)
            ->update(["used" => $item->used + 1]);

        stats::where("name", "stats_visit_total")
            ->update(["value" => DB::raw("value + 1")]);

        return redirect($item->link);
    }
}
