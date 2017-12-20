<?php

namespace App\Http\Controllers;

use App\stats;
use App\urls;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class StatsController extends Controller
{
    /**
     * @return mixed
     */
    public function view()
    {
        $items = urls::where("used", ">=", "0")
            ->orderBy("used", "desc")
            ->take(5)
            ->get();

        $stats = stats::where("id", ">=", "0")
            ->get();

        return View::make('stats', [
            "x" => 1,
            "items" => $items,
            "stats" => $stats
        ]);
    }

    public function search(Request $request)
    {
        //dd($request->input());
        $shorted = parse_url($request->input("shorted"))["path"];
        $shorted = (strlen($shorted) == 5) ? $shorted : substr($shorted, 1, 5);

        $search = urls::where("shorted", $shorted)
            ->first();

        $items = urls::where("used", ">=", "0")
            ->orderBy("used", "desc")
            ->take(5)
            ->get();

        $stats = stats::where("id", ">=", "0")
            ->get();

        if(!empty($search)){
            return View::make('stats', [
                "x" => 1,
                "items" => $items,
                "stats" => $stats,
                "search" => $search
            ]);
        }

        return View::make('stats', [
            "x" => 1,
            "items" => $items,
            "stats" => $stats,
            "error" => "ok"
        ]);
    }
}
