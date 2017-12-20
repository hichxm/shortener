<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

//ROUTE: xxx.xx/
Route::get("/", "HomeController@view")
    ->name("home.view");

//ROUTE: xxx.xx/
Route::post("/", "HomeController@store")
    ->name("home.store");

//ROUTE: xxx.xx/contacts
Route::get("/contact", "ContactController@view")
    ->name("contact.view");

//ROUTE: xxx.xx/contacts
Route::post("/contact", "ContactController@store")
    ->name("contact.store");

//ROUTE: xxx.xx/stats
Route::get("/stats", "StatsController@view")
    ->name("stats.view");

//ROUTE: xxx.xx/stats
Route::post("/stats", "StatsController@search")
    ->name("stats.search");

//ROUTE: xxx.xx/{shorted}
Route::get("/{shorted}", "HomeController@shorted")
    ->where("shorted", "[0-9A-Za-z]{5}")
    ->name("home.shorted");