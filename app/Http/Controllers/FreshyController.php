<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use App\Freshy;
use Session;
use App\Ticket;
use DB;
use Auth;
use Carbon\Carbon;
use Symfony\Component\HttpKernel\HttpCache\Ssi;

class FreshyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('web');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $lastlog = DB::table('activity_log')->select('activity')->orderBy('id', 'desc')->take(1)->value('activity');
        if ($reg_amount = Freshy::count() >= 10000)
            return view('welcome', ['lastlog' => $lastlog])->with(Session::flash('fullseat', 'Locked'));
        return view('freshy');
    }

    public function about()
    {
        return view('about');
    }

    public function frontindex()
    {
        $lastlog = DB::table('activity_log')->select('activity')->orderBy('id', 'desc')->take(1)->value('activity');
        if ($reg_amount = Freshy::count() >= 10000)
            return view('welcome', ['lastlog' => $lastlog])->with(Session::flash('fullseat', 'Locked'));
        return view('welcome', ['lastlog' => $lastlog]);
    }

    public function done()
    {
        return view('finishreg');
    }

    public function searchindex()
    {
        return view('searchcode');
    }

    public function searchlostindex()
    {
        return view('searchname');
    }

    public function checkfirst(Request $request)
    {
        return view('validatereg', ['request' => $request]);
    }

    public function redirectback(Request $request)
    {

//        dd(unserialize($request->data));
//        return view('freshy');
        return redirect()->to(route('freshy'))->withInput(unserialize($request->data));
    }

    public function searchlost(Request $request)
    {
        //BookingDates::where('email', Input::get('email'))->orWhere('name', 'like', '%' . Input::get('name') . '%')->get();

//        $userinfo = Freshy::whereName($request->namesearch)->orWhere('name', 'like', '%' . $request->namesearch . '%')->orWhere('surname', 'like', '%' . $request->surnamesearch . '%')->first();
        $userinfo = Freshy::whereName($request->namesearch)->where('surname', $request->surnamesearch)->first();
        $searchdata = array();
        $searchdata['search'] = $request->search;
        if (is_null($userinfo) || empty($userinfo)) {
            $log = "Someone forget their code and finding it!!";
            DB::table('activity_log')->insert(['activity' => $log, 'created_at' => Carbon::now()]);
            return redirect()->to(route('searchlostindex'))->withInput($searchdata)->with(Session::flash('error', 'No Result Found / ไม่พบผลลัพธ์ค้นหา'));
        }
        $countsurname = strlen($userinfo['surname']);
        $result = array();
        $result['name'] = $userinfo['name'];
        $result['surname'] = substr($userinfo['surname'], 0, $countsurname / 4);
        for ($i = $countsurname / 4; $i < $countsurname; $i++) {
            $result['surname'] = $result['surname'] . "*";
        }

//        dd($result);

        $result['nickname'] = $userinfo['nickname'];
        $result['telephone'] = "No Telephone";
        if (!empty($userinfo['telephone'])) {
            $result['telephone'] = substr($userinfo['telephone'], 0, 2) . "****" . substr($userinfo['telephone'], 6, 4);
        }

        $result['faculty'] = $userinfo['faculty'];
        $ticket = Ticket::where('freshy_id', $userinfo['id'])->first();
        $result['status'] = is_null($ticket) || empty($ticket) ? "Registered" : "Boarded";
        if ($result['status'] == "Boarded")
            $result['seat'] = $ticket['seat_id'];
        else
            $result['seat'] = "-";
        $code = 'CODE FOUND! DON\'T LOSE AGAIN';
        $log = $result['nickname'] . " lost him/her code and found it now!";
        DB::table('activity_log')->insert(['activity' => $log, 'created_at' => Carbon::now()]);
        return redirect()->to(route('searchlostindex'))->withInput($searchdata)->with(Session::flash('result', $code))->with(['data' => $result])->with(Session::flash('datacode', $userinfo['id']));
    }


    public function search(Request $request)
    {
        $userinfo = Freshy::Find($request->search);
        $searchdata = array();
        $searchdata['search'] = $request->search;
        if (is_null($userinfo) || empty($userinfo))
            return redirect()->to(route('searchindex'))->withInput($searchdata)->with(Session::flash('error', 'No Result Found / ไม่พบผลลัพธ์ค้นหา'));
        $countsurname = strlen($userinfo['surname']);
        $result = array();
        $result['name'] = $userinfo['name'];
        $result['surname'] = substr($userinfo['surname'], 0, $countsurname / 4);
        for ($i = $countsurname / 4; $i < $countsurname; $i++) {
            $result['surname'] = $result['surname'] . "*";
        }

//        dd($result);

        $result['nickname'] = $userinfo['nickname'];
        $result['telephone'] = "No Telephone";
        if (!empty($userinfo['telephone'])) {
            $result['telephone'] = substr($userinfo['telephone'], 0, 2) . "****" . substr($userinfo['telephone'], 6, 4);
        }

        $result['faculty'] = $userinfo['faculty'];
        $ticket = Ticket::where('freshy_id', $userinfo['id'])->first();
        $result['status'] = is_null($ticket) || empty($ticket) ? "Registered" : "Boarded";
        if ($result['status'] == "Boarded")
            $result['seat'] = $ticket['seat_id'];
        else
            $result['seat'] = "-";
        return redirect()->to(route('searchindex'))->withInput($searchdata)->with(Session::flash('result', 'Data Found!'))->with(['data' => $result]);
    }

    public function insert(Request $requests)
    {
        $request = unserialize($requests->data);


//
//
//        //dd($request);
//        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/registertu84-firebase-adminsdk-c4bt4-60adf5b57a.json');
//        $firebase = (new Factory)
//            ->withServiceAccount($serviceAccount)
//            ->withDatabaseUri('https://registertu84.firebaseio.com/')
//            ->create();
//
//        $database = $firebase->getDatabase();
//        $newpost = $database->getReference('/')->getValue();


        $data = Freshy::whereName($request['name'])->whereSurname($request['surname'])->whereNickname($request['nickname'])->count();
        if ($data != 0)
            return redirect()->intended(route('freshy-done'))->with(Session::flash('error', 'ข้อมูลของคุณได้ถูกลงทะเบียนเรียบร้อยแล้ว ไม่สามารถลงซ้ำได้ หากมีปัญหากรุณาติดต่อ P\'Staff'));

//        if ($newpost['reg_amount'] >= 10000 || $newpost['reg_amount'] <= 1000)
//            return redirect()->intended(route('freshy-done'))->with(Session::flash('error', 'ขณะนี้ระบบได้ปิดการจองที่นั่งแล้ว เนื่องจากมีการจองเต็มจำนวน กรุณาติดต่อ P\'Staff'));


        $freshy = Freshy::Create($request);
        if ($freshy->id >= 10000 || Freshy::count() >= 10000) {
            $freshy->delete();
            return redirect()->intended(route('freshy-done'))->with(Session::flash('error', 'ขณะนี้ระบบได้ปิดการจองที่นั่งแล้ว เนื่องจากมีการจองเต็มจำนวน กรุณาติดต่อ P\'Staff'));
        }

        $tmp = $freshy->id;
        $log = $request['nickname'] . " just landing Thammasat University 1st time!";
        DB::table('activity_log')->insert(['activity' => $log, 'created_at' => Carbon::now()]);
        return redirect()->intended(route('freshy-done'))->with(Session::flash('regdone', 'Your registration Completed'))->with(Session::flash('code', $tmp));

//        return redirect()->intended(route('freshy-done'))->with(Session::flash('error', 'Error unknown has occurred'));

    }
}
