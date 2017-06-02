<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Arcanedev\Localization\Entities\LocaleCollection;

use Xinax\LaravelGettext\Facades\LaravelGettext;
class HomeController extends Controller {

    public function changeLang($locale=null) {
        LaravelGettext::setLocale($locale);
        return redirect()->back();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        return view('home');
    }

}
