<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Carbon\Carbon;
use DB;
use App\Ticket;
use App\User;
use App\Freshy;
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
//        $lastlog = DB::table('activity_log')->orderBy('id','desc')->take(5)->value('activity');
    $lastlog = DB::table('activity_log')->orderBy('id','desc')->get()->take(5);
//        dd("HIEI");
        $ticket = Ticket::count();
        $staff = User::count();
        $reg_amount = Freshy::count();
        if (Auth::user()->state == 'unverify') {
//            dd(Auth::user()->state );
            Auth::logout();
            return redirect()->intended(route('login'))->with(Session::flash('error', 'You are registered but didn\'t Aprrove by Developer please Contact Master Admin, more info in about page'));
        } else
            return view('homeadmin',['staff_amount'=>$staff,'reg_amount'=> $reg_amount,'board_amount'=>$ticket,'lastlog'=>$lastlog]);
    }


}
