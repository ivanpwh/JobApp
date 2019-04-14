<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Detail;
use Response;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() 
    { 
        $this->middleware('auth'); 
        // $this->middleware('role:admin'); 
    }
    public function index()
    {
        return view('admin/static/index');
    }

    public function users(Request $request)
    {
        $users = User::where('status_cv','=',0)->get();
        // $details->load('user');
        
        if ($request->ajax()) {
            # code...
            if ($request->status_cv == '0') {
                # code...
                // dd($request->id);
                $users = User::where('status_cv','=', 0)->get(); 
                $view = (String) view('admin.static.list')->with('users',$users)->with('details', $details)->render();
                return response()->json(['view'=> $view, 'status' => 'success']);
            } else {
                // dd($request->id);
                $details = User::with('detail')->find($request->id)->detail;
                $view = (String) view('admin.static.list')->with('details', $details)->render();
                return response()->json(['view'=> $view, 'status' => 'success']);
            }
        } else {
            # code...
            return view('admin/static/users')->with('users',$users);
        }
    }
    
    public function status(Request $request)
    {
        // $users = User::where('status_cv','=', 1)->get();
        // $details = Detail::all(); 
        // return view('admin.static.list')->with('users',$users)->with('details',$details); 

        if ($request->ajax()) {
            if ($request->status_cv == '0') {
                # code...
                $users = User::where('status_cv','=', 0)->get();
                $view = (String) view('admin.static.list')->with('users',$users)->render();
                return response()->json(['view'=> $view, 'status' => 'success']);
            } elseif ($request->status_cv == '1') {
                # code...
                $users = User::where('status_cv','=', 1)->get(); 
                $view = (String) view('admin.static.list')->with('users',$users)->render();
                return response()->json(['view'=> $view, 'status' => 'success']);
            } elseif ($request->status_cv == '2') {
                # code...
                $users = User::where('status_cv','=', 2)->get(); 
                $view = (String) view('admin.static.list')->with('users',$users)->render();
                return response()->json(['view'=> $view, 'status' => 'success']);
            }
        }    
    }
    
    public function statusAccept(Request $request,$id){
        if ($request->ajax()) {
            # code...
            if ($request->status_cv == '1') {
                # code...
                $users = User::where('status_cv','=', 1)->get();
                $view = (String) view('admin.static.list')->with('users',$users)->render();
                return response()->json(['view'=> $view, 'status' => 'success']);
            }
        } else {
            $users = User::find($id);
            $users->status_cv = "1";
            $users->save();
            return redirect()->route('admin.users');
        }
        
    }

    public function statusReject(Request $request,$id){
        if ($request->ajax()) {
            # code...
            if ($request->status_cv == '2') {
                # code...
                $users = User::where('status_cv','=', 2)->get();
                $view = (String) view('admin.static.list')->with('users',$users)->render();
                return response()->json(['view'=> $view, 'status' => 'success']);
            }
        } else {
            $users = User::find($id);
            $users->status_cv = "2";
            $users->save();
            return redirect()->route('admin.users');
        }
        
    }
    public function statusUnread(Request $request,$id){
        if ($request->ajax()) {
            # code...
            if ($request->status_cv == '0') {
                # code...
                $users = User::where('status_cv','=', 0)->get();
                $view = (String) view('admin.static.list')->with('users',$users)->render();
                return response()->json(['view'=> $view, 'status' => 'success']);
            }
        } else {
            $users = User::find($id);
            $users->status_cv = "0";
            $users->save();
            return redirect()->route('admin.users');
        }
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $users = User::find($id);
        $details = User::with('detail')->find($id)->detail;
        $view = (String) view('admin.static.view')->with('users',$users)->with('details', $details)->render();
        return response()->json(['view'=> $view, 'status' => 'success']);
        

        // if ($request->ajax()) {
            # code...
            // dd($request);
        //     $users = User::find($request->id);
        //     $details = User::with('detail')->find($request->id)->detail;
        //     $view = (String) view('admin.static.list')->with('users',$users)->with('details', $details)->render();
        //     return response()->json(['view'=> $view, 'status' => 'success']);
        // }
        
        // if ($request->ajax()) {
        //     # code...
        //     if ($request->id == '3') {
        //         # code...
        //         $users = User::find(3);
        //         // $details = User::with('detail')->find($id)->detail;
        //         $view = (String) view('admin.static.list')->with('users',$users)->render();
        //         return response()->json(['view'=> $view, 'status' => 'success']);
        //     }
        // }
    }
    
    public function showUpdate(Request $request, $id)
    {
        $users = User::find($id);
        $details = User::with('detail')->find($id)->detail;
        $view = (String) view('admin.static.update')->with('users',$users)->with('details', $details)->render();
        return response()->json(['view'=> $view, 'status' => 'success']);
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->name);
        $user = User::find($id);
        $detail = User::with('detail')->find($id)->detail;

        if( $request->hasFile('photo') ){
            $file = $request->file('photo');
            $destination_path = 'uploads/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $file->move($destination_path, $filename);
            $detail->photo = $destination_path . $filename;
        }
        if ($request->hasFile('cv') ){
            # code...
            $file2 = $request->file('cv');
            $destination_path2 = 'uploads/';
            $filename2 = str_random(6).'_'.$file2->getClientOriginalName();
            $file2->move($destination_path2, $filename2);
            $detail->cv = $destination_path2 . $filename2;
        }
        $detail->sex = $request-> input('sex');
        $detail->religion = $request->input('religion');
        $detail->card = $request->input('card');
        $detail->address = $request->input('address');
        $detail->last_edu = $request->input('last_edu');
        $detail->majors = $request->input('majors');
        $detail->edu_place = $request->input('edu_place');
        $detail->save();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->dob = $request->input('dob');
        $user->save();

        // $users = User::where('status_cv','=',0)->get();
        return redirect()->route('admin.users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return response()->json($post);

    }
}
