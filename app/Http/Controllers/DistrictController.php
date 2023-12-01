<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Member;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $districts=District::orderBy('name', 'ASC')->paginate(10);
        return view('districts.index', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('districts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate=$request->validate([
            'name'=>'required',
            'elder_name'=>'required',
            'elder_phone'=>'required',
            'elder_email'=>'required',
        ]);
        $district = District::create($request->all());
        return redirect(route('districts.index'))->with('success', 'District created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(District $district)
    {
        // dd($district->id);
        //get the district members

        $districtMembers=Member::where('district_id',$district->id)->paginate(20);

        return view('districts.show',compact('districtMembers','district'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(District $district)
    {
        return view('districts.edit', compact('district'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, District $district)
    {
        $validate=$request->validate([
            'name'=>'required',
            'elder_name'=>'required',
            'elder_phone'=>'required',
            'elder_email'=>'required',
        ]);
        $district->update($request->all());
        return redirect(route('districts.index'))->with('success', 'District updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(District $district)
    {
        //delete district
        $district->delete();
        return redirect(route('districts.index'))->with('success', 'District deleted successfully');
    }
}
