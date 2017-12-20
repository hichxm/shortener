<?php

namespace App\Http\Controllers;

use App\contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ContactController extends Controller
{
    /**
     * @return mixed
     */
    public function view()
    {
        return View::make('contact');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {

        $validator = \Validator::make($request->input(), [
            "mail" => "required|email",
            "content" => "required|min:10"
        ]);

        if (!$validator->fails()){
            $item = new contacts();
            $item->mail = $request->input("mail");
            $item->content = $request->input("content");
            $item->save();

            return View::make('contact', [
                "success" => "ok"
            ]);
        }

        return View::make('contact', [
            "error" => "ok"
        ]);
    }
}
