<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Session;
use DB;
use Carbon\Carbon;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $login_type = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'name';

        $request->merge([
            $login_type => $request->input('email')
        ]);

        if (Auth::attempt($request->only($login_type, 'password'))) {
            $log = Auth::user()->name . " just logged in";
            DB::table('activity_log')->insert(['activity'=>$log,'created_at'=> Carbon::now()]);
            return redirect()->intended($this->redirectPath());
        }
        $newname = $request->email;
        $log ="someone trying logging in with user: ".substr($newname,0,4) . "****** is it correct? ";
        #print_r($login_type);
        #dd($log);
        DB::table('activity_log')->insert(['activity'=>$log,'created_at'=> Carbon::now()]);
        return redirect()->back()
            ->withInput()
            ->with(Session::flash('error', 'Your Credential Doesn\'t match our record, Your activity has logged'));
    }



    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
