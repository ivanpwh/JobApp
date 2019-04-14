<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->user()->hasRole('admin')){
            return redirect('admin')->with('status','Login Admin Success!!');
        } elseif ($request->user()->hasRole('user')) {
            // dd($request->user()->id);
            // return redirect('user',['id',$request->user()->id])->with('status','Login User Succes!!');
            return redirect()->action('UserController@index', [$request->user()->id]);
        } 
        else {
            return redirect('/');
        }
    }
}
