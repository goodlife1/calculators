<?php

namespace App\Http\Controllers;

use App\Mail\ContactAs;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function sendMessage(Request $request)
    {
        \Mail::to('vasyamindresku@gmail.com')->send(new ContactAs($request));
    }

    public function changeLanguage($lang)
    {
        $lang = $lang == 'en'?'':''.$lang;
        $base_path = str_replace(url('/'), '', url()->previous());
//        dump($base_path);
        $path =str_replace('/ru/', '', $base_path);
//        dump($path);
        $path =  $path == '/ru'? '':$path;
//        dd($path);
        return redirect($lang.$path);

    }
}
