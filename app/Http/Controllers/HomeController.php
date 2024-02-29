<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\userCodes;
use App\Models\Matches;
use App\Models\Transaction;
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


    public function verifyPost(Request $request){

        $code=$request->code;

        $check=userCodes::where('code',$code)->first();

        if($check){
            //check if the code is expired or not
            $createdAt = Carbon::parse($check->created_at);
            $currentDate = Carbon::now();

            if ($createdAt->diffInMonths($currentDate) > $check->duration) {
                return redirect(route('matches.index'))->withErrors('error', "The code has expired");
            } else {
                $r="match/".$check->game;
                return redirect($r)->with('error', "The code you entered does not exist");
            }

        }else{
            return redirect()->back()->withErrors('error', "The code you entered does not exist");
        }

    }
    public function createUser(){

        return view('matches.createuser');

    }

    public function generateRandomCode() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';

        // Generate a random 10-character code
        for ($i = 0; $i < 10; $i++) {
            $code .= $characters[mt_rand(0, strlen($characters) - 1)];
        }

        return $code;
    }

    public function createUserPost(Request $request){

        $game=$request->game;
        $phone=$request->phone;
        $duration=$request->duration;


        $code=$this->generateRandomCode();

        $userCodes=new userCodes();
        $userCodes->phone=$phone;
        $userCodes->duration=$duration;
        $userCodes->code=$code;
        $userCodes->game=$game;

        try{
            if($userCodes->save()){
                return redirect(route('getusers'))->with('success', 'User created successfully');
            }
        }catch(Exception $e){
            return redirect(route('matches.index'))->with('success', $e->getMessage());
        }



    }

    public function verifycode(){
        return view('matches.verify');
    }

    public function getusers(){

        $allUsers=userCodes::where('id','>',0)->orderBy('id','DESC')->paginate(20);
        return view('matches.getusers')->with(compact('allUsers'));
    }

    public function homepage(){

        $dailysuretips=Matches::where('type','ds')
        ->whereDate('created_at',\Carbon\Carbon::today())
        ->get();
        return view('welcome')->with(compact('dailysuretips'));
    }

    public function match(Request $request){

        $id=$request->id;

        $dailysuretips=Matches::where('type',$id)
        ->whereDate('created_at',\Carbon\Carbon::today())
        ->get();
        return view('matches.show')->with(compact('dailysuretips'));

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $q = Member::query();
        //loop through the request and add the where clauses
        foreach ($request->except(['page', 'per_page']) as $key => $value) {
            if($value)
                $q->where($key, 'like', '%' . $value . '%');
        }
        $members = $q->paginate(20);

        $q = Transaction::query();
        //loop through the request and add the where clauses
        foreach ($request->except(['page', 'per_page']) as $key => $value) {
            if ($value) {
                $q->where($key, 'like', '%' . $value . '%');
            }
        }
        $transactions = $q->paginate(10);
        $matches=Matches::where('id','!=','-1')->orderBy('id','DESC')->paginate(20);
        

        return view('home', compact('members','transactions','matches'));
    }
}
