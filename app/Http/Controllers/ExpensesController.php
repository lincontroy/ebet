<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $expenses = Expenses::paginate(20);

        return view('expenses.index',compact('expenses'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $expenseCategorys=ExpenseCategory::all();
        return view('expenses.create',compact('expenseCategorys'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validate=$request->validate([
            'name'=>'required',
            'amount'=>'required',
            'date'=>'required',
        ]);

        
        if(Expenses::create($request->all())){
            return redirect('expenses')->with('success','Expense added successfully');
        }else{
            return redirect()->back()->with('error','An error occured');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Expenses $expenses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expenses $expenses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expenses $expenses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expenses $expenses)
    {
        //
    }
}
