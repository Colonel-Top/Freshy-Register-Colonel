<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Auth;
use Session;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lastlog = DB::table('activity_log')->select('activity')->orderBy('id','desc')->take(5)->value('activity');
//        dd("HIEI");
        if (Auth::user()->state == 'unverify') {
//            dd(Auth::user()->state );
            Auth::logout();
            return redirect()->intended(route('login'))->with(Session::flash('error', 'You are registered but didn\'t Aprrove by Developer please Contact Master Admin, more info in about page'));
        } else
            return view('homeadmin',['lastlog'=>$lastlog]);
    }

}
