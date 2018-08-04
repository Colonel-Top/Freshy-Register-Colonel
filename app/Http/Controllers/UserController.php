<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Freshy;
use App\User;
use Session;
use DB;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Carbon\Carbon;
use Kreait\Firebase\ServiceAccount;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public static function throws()
    {
        if (Auth::user()->state == 'unverify') {
            Auth::logout();
            return redirect()->intended(route('login'))->with(Session::flash('error', 'You are not Approve by Developer please Contact Master Admin, more info in about page'));
        }
    }
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function logouts()
    {
        Auth::logout();
        return redirect()->intended(route('index'));
    }
    public function showlive()
    {

    }
    public function index()
    {
        self::throws();

        if(Auth::user()->state == "unverify")
            return redirect()->intended(route('index'));

        $ticket = Ticket::count();
        $lastlog = DB::table('activity_log')->orderBy('id','desc')->get()->take(5);
        $reg_amount = Freshy::count();

        return view('homeadmin',['reg_amount'=> $reg_amount,'board_amount'=>$ticket,'lastlog'=>$lastlog]);
    }
    public function showunique($id)
    {

        self::throws();

        $data = Freshy::where('id',$id)->first();

        return view('unique',['data2'=>$data]);

    }
    public function entry($id)
    {

        self::throws();

        if(Auth::user()->roles != "admin")
            return redirect()->intended(route('indexhome'));



        $user = User::findOrFail($id);

        $log = $user->name." just approved staff position by developer";
        DB::table('activity_log')->insert(['activity'=>$log,'created_at'=> Carbon::now()]);
        $user->state='verified';
        $user->save();
        return redirect()->intended(route('goapp'))->with(Session::flash('done','Data Entry User Approved!'));
    }
    public function abandon($id)
    {

        self::throws();

        if(Auth::user()->roles != "admin")
            return redirect()->intended(route('indexhome'));
        $user = User::findOrFail($id);
        $log = $user->name." just got declined staff position by developer! so sad";
        DB::table('activity_log')->insert(['activity'=>$log,'created_at'=> Carbon::now()]);
        $user->delete();
        return redirect()->intended(route('goapp'))->with(Session::flash('done','Data User Abandoned !'));
    }
    public function goapp()
    {
        self::throws();

        if(Auth::user()->roles != "admin")
            return redirect()->intended(route('indexhome'));
        $data = User::where('state','unverify')->get();
//        dd($data);
        return view('approve',['data'=>$data]);
    }
    public function searchname(Request $request)
    {
        self::throws();

        $userinfo = Freshy::whereName($request->namesearch)->orWhere('name', 'like', '%' . $request->name. '%')->orWhere('surname', 'like', '%' . $request->surname . '%')->get();
        // $userinfo = Freshy::whereName($request->namesearch)->where('surname',$request->surnamesearch)->first();

        if (is_null($userinfo) || empty($userinfo))
            return redirect()->back()->with(Session::flash('error', 'Error unknown has occurred'));
        $data = array();
        foreach($userinfo as $singleitem)
        {
            $data[] = $singleitem;
        }

        return redirect()->back()->with(['data'=>$data]);
    }

    public function searchfaculty(Request $request)
    {
        self::throws();

        $userinfo = Freshy::where('faculty', 'like', '%' . $request->faculty . '%')->get();
        // $userinfo = Freshy::whereName($request->namesearch)->where('surname',$request->surnamesearch)->first();
        $searchdata = array();

        if (is_null($userinfo) || empty($userinfo))
            return redirect()->back()->with(Session::flash('error','No Data found'));
        $data = array();
        foreach($userinfo as $singleitem)
        {
            $data[] = $singleitem;
        }

        return redirect()->back()->with(['data'=>$data]);
    }

    public function searchcode(Request $request)
    {
        self::throws();

        $userinfo = Freshy::where('id','=',$request->id)->get();
        // $userinfo = Freshy::whereName($request->namesearch)->where('surname',$request->surnamesearch)->first();

        if (is_null($userinfo) || empty($userinfo))
            return redirect()->back()->with(Session::flash('error','No Data found'));
        $data = array();
        foreach($userinfo as $singleitem)
        {
            $data[] = $singleitem;
        }

        return redirect()->back()->with(['data'=>$data]);
    }
}
