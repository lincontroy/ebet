<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $channels=Channel::orderBy('channel_name', 'ASC')->paginate(10);
        return view('channels.index', compact('channels'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('channels.create');
        
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validate=$request->validate([
            'channel_name'=>'required',
        ]);
        $channels = Channel::create($request->all());
        return redirect(route('channels.index'))->with('success', 'Channel created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Channel $channel)
    {
        //

        $q="%#$channel->channel_name";
        $transactions=Transaction::where('BillRefNumber', 'LIKE', $q)->paginate(10);

        return view('channels.show',compact('channel','transactions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Channel $channel)
    {
        //
        return view('channels.edit', compact('channel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Channel $channel)
    {
        //
        $validate=$request->validate([
            'channel_name'=>'required',
            'expiry'=>'required',
           
        ]);
        $channel->update($request->all());
        return redirect(route('channels.index'))->with('success', 'Channel updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Channel $channel)
    {
        //
        $channel->delete();
        return redirect(route('channels.index'))->with('success', 'Channel deleted successfully');
    }
}
