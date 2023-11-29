<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
       

        $q = Transaction::query();
        //loop through the request and add the where clauses
        foreach ($request->except(['page', 'per_page']) as $key => $value) {
            if ($value) {
                $q->where($key, 'like', '%' . $value . '%');
            }
        }
        $transactions = $q->paginate(10);
        return view('transactions.index', compact('transactions'));

    }
    
    public function savetransaction(Request $request){
        
         $validate=$request->validate([
            'PaymentMethod'=>'required',
            'Channel'=>'required',
            'amount'=>'required',
        ]);
        
        $name=$request->PaymentMethod;
        $channel=$request->Channel;
        $member=$request->Member;
        $billref=$member.'#'.$channel;
        $code=$request->Transactioncode;
        if ($code === null) {
    
            $code = Str::random(10); // Adjust the length as needed
        }
        $amount=$request->amount;
        $created_at=$request->paidat;
        
        $s=new Transaction();
        
        
        $s->TransactionType=$name;
        $s->TransID=$code;
        $s->TransAmount=$amount;
        $s->BillRefNumber=$billref;
        
        if($s->save()){
            return redirect()->back()->with('success', 'Transaction created successfully');
            // return redirect(route('transactions'))->with('success', 'Transaction created successfully');
        }else{
            return redirect()->back()->with('error', 'An error occured');
        }
    }

    public function store(Request $request){


        //get the bill reference number
        
        $billref=$request->BillRefNumber;
        //get the transaction code
        $transactioncode=$request->TransID;
        
        $amount=$request->TransAmount;
        
        $fname=$request->FirstName;
        
        $parts = explode('#', $billref);
        
        // Get the second part of the exploded array
        $result = isset($parts[1]) ? $parts[1] : null;
        
        if($result=='offering' || $result=='OFFERING'){
            $message="Shallom $fname,\nWe have received your offering of  KES. $amount, reference: $transactioncode. \nThank you.";
        }else if($result=='tithe' || $result=='TITHE'){
            $message="Shallom $fname,\nWe have received your tithe of  KES. $amount, reference: $transactioncode. \nThank you.";
        }else{
             $message="Shalom $fname, we have received KES. $amount, reference: $transactioncode. Thank you.";
        }


        $transaction = Transaction::create($request->all());

        

        //send sms to 
        return sendsms($request->MSISDN,$message);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('transactions.create');
    }



    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
