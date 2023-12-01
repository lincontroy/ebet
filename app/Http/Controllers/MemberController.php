<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        //

        $q = Member::query();
        //loop through the request and add the where clauses
        foreach ($request->all() as $key => $value) {
            if($value)
                $q->where($key, 'like', '%' . $value . '%');
        }
        $members = $q->paginate(20);

        return view('members.show', compact('members'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate=$request->validate([
            'name'=>'required',
        ]);
        $member = Member::create($request->all());
        $memberId = $member->id;
        $name=$request->name;
        $churchName=env('APP_NAME');
        $message="Hello $name, Welcome to $churchName, We are happy you joined us.\nFor any kind of contribution use our paybill 4070303. \nAccount number type $memberId#offering for offering.\n$memberId#tithe for tithe. \nFor more enquires contact 0704800563";
        //Send sms to the newly created member
        sendsms($request->phone,$message);
        return redirect(route('home'))->with('success', 'Member created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //get the members transaction details
        $q="$member->id#%";
        $transactions=Transaction::where('BillRefNumber', 'LIKE', $q)->paginate(10);
        return view('members.index', compact('transactions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $validate=$request->validate([
            'name'=>'required',
        ]);
        $member->update($request->all());
        return redirect(route('home'))->with('success', 'Member updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect(route('home'))->with('success', 'Member deleted successfully');
    }
}
