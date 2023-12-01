<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use App\Models\Member;
use App\Models\Channel;
use Illuminate\Http\Request;
use App\Models\District;

class ReportsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        //

        // dd($request->all());

        if($request->channel !=null || $request->channel !='s'){
            $channel=$request->channel;
        }
        if($request->district !=null || $request->district !='d'){
            $district=$request->district;
        }
        if($request->from !=null ){
            $from=$request->from;
        }
        if($request->to !=null ){
            $to=$request->to;
        }


        $channels=Channel::all();
        $districts=District::ALL();

        $q = Transaction::query();
        //loop through the request and add the where clauses
        foreach ($request->except(['page', 'per_page']) as $key => $value) {
            if ($value) {
                $q->where($key, 'like', '%' . $value . '%');
            }
        }
        $transactions = $q->paginate(10);

        return view('reports.index', compact('transactions','channels','districts'));
        
    }


}
