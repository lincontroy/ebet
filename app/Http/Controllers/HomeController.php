<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $q = Member::query();
        //loop through the request and add the where clauses
        foreach ($request->all() as $key => $value) {
            if($value)
                $q->where($key, 'like', '%' . $value . '%');
        }
        $members = $q->paginate(20);
        

        return view('home', compact('members'));
    }
}
