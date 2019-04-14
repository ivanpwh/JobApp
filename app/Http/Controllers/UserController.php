<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Detail;
use App\Http\Requests\DetailRequest;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() 
    { 
        $this->middleware('auth'); 
        // $this->middleware('role:user'); 
    }

    public function index($id)
    {
        // dd($id);
        $currentUser = User::find($id);
        // dd($currentuser);
        // dd($request);
        // $status = DB::table('users')->where('id',$id)->pluck('status');
        // dd($status);
        // return redirect()->route('user.show',$id);
        $details = User::with('detail')->find($id)->detail;
        // dd($details);
        if ($currentUser->status == 0) {
            // dd($currentUser->status);
            return view('user/static/form')->with('currentUser',$currentUser);
        } else {
            return view('user/static/index')->with('currentUser',$currentUser)->with('details',$details);
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
    public function store(DetailRequest $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'sex' => 'required',
        //     'religion' => 'required',
        //     'card' => 'required'|'min:16',
        //     'last_edu' => 'required',
        //     'majors' => 'required',
        //     'edu_place' => 'required'
        // ]);

        // if ($validator->fails()) {
        //     return redirect('user',[$request->id])
        //                 ->withErrors($validator)
        //                 ->withInput();
        // } else {
            
        // }
        
        $detail = new Detail;

        // upload the photo profile //
        $file = $request->file('photo');
        $destination_path = 'uploads/';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        $file->move($destination_path, $filename);
        
        // upload the Curriculum vitae
        $file2 = $request->file('cv');
        $destination_path2 = 'uploads/';
        $filename2 = str_random(6).'_'.$file2->getClientOriginalName();
        $file2->move($destination_path2, $filename2);

        // save image data and details into database //
        $detail->photo = $destination_path . $filename;
        $detail->cv = $destination_path2 . $filename2;
        $detail->user_id = $request->id;
        $detail->sex = $request-> input('sex');
        $detail->religion = $request->input('religion');
        $detail->card = $request->input('card');
        $detail->address = $request->input('address');
        $detail->last_edu = $request->input('last_edu');
        $detail->majors = $request->input('majors');
        $detail->edu_place = $request->input('edu_place');
        $detail->save();

        //change status user to 1
        $user = User::find($request->id);
        $user->status = 1;
        $user->save();
            
        return redirect('home');
    }

    public function edit($id)
    {
        $details = User::with('detail')->find($id)->detail;
        $currentUser = User::find($id);
        return view('user/static/edit')->with('currentUser',$currentUser)->with('details',$details);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $currentUser = User::find($id);
    //     $details = User::with('detail')->find($id)->detail;
    //     return view('user/static/upload')->with('currentUser',$currentUser)->with('details',$details);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function upload(Request $request,$id)
    // {
    //     $details = User::with('detail')->find($id)->detail;
    //     $currentUser = User::find($id);
    //     // dd($request->cv);
    //     if( $request->hasFile('cv') ){
    //         $file = $request->file('cv');
    //         $destination_path = 'uploads/';
    //         $filename = str_random(6).'_'.$file->getClientOriginalName();
    //         $file->move($destination_path, $filename);
    //         $details->cv = $destination_path . $filename;
    //         $details->save();
    //         $file = $request->file('photo');
    //     }
    //     return view('user/static/upload')->with('currentUser',$currentUser)->with('details',$details);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $user = User::find($id);
        $detail = User::with('detail')->find($id)->detail;

        if( $request->hasFile('photo') ){
            $file = $request->file('photo');
            $destination_path = 'uploads/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $file->move($destination_path, $filename);
            $detail->photo = $destination_path . $filename;
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

        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
