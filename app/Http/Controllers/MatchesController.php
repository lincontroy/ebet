<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use Illuminate\Http\Request;

class MatchesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $matches=Matches::where('id','!=','-1')->orderBy('id','DESC')->paginate(20);

        return view('matches.index')->with(compact('matches'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('matches.create');
    }

    public function getMatches(Request $request){

        $type=$request->type;

        $all=Matches::where('type',$type)
        ->whereDate('created_at',\Carbon\Carbon::today())
        ->get();

        return response()->json(["data"=>$all]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $matches=Matches::create($request->all());

        return redirect(route('matches.index'))->with('success', 'Match created successfully');


    }

    /**
     * Display the specified resource.
     */
    public function show(Matches $matches)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matches $matches)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matches $matches)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matches $matches)
    {
        //
    }
}
