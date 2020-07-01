<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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
    public function index()
    {
        $users= User::all();
        return view('home',compact('users'));
    }

    public function user($id)
    {
        $user= User::find($id);
        return view('user',compact('user'));
    }

    public function ajax(Request $request)
    {
        $user= User::find($request->user_id);
        $response= auth()->user()->toggleFollow($user);

        return response()->json(['success'=>$response]);
    }
}
