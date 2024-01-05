<?php

namespace App\Http\Controllers;

use App\Models\Leagues;
use Illuminate\Http\Request;

class LeaguesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $leagues=Leagues::where('id','!=',1)->paginate(20);

        return view('leagues.index')->with(compact('leagues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('leagues.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $leagues=Leagues::create($request->all());

        return redirect(route('leagues.index'))->with('success', 'League created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Leagues $leagues)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Leagues $leagues)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Leagues $leagues)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leagues $leagues)
    {
        //
    }
}
