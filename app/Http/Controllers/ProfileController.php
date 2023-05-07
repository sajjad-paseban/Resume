<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use File;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware('authLogin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Profile::find(1);
        return view('admin.pages.user_account_settings',compact('profile'));
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
    public function show($id)
    {
        //
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
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required'
        ],[
            'firstname.required'=>'فیلد نام خالی می باشد',
            'lastname.required'=>'فیلد نام خانوادگی خالی می باشد',

        ]);

        $profile = Profile::find($id);

        if($request->file('image_path')){
            if($profile->image_path)
                File::delete('tmp/profile/'.$profile->image_path);

            $filename = Date('Y-m-d-H-i-s-').$request->file('image_path')->getClientOriginalName();
            $request->file('image_path')->move('tmp/profile/',$filename);
            $profile->image_path = $filename;
        }

        $profile->firstname = $request->get('firstname');
        $profile->lastname = $request->get('lastname');
        $profile->description = $request->get('description');
        $profile->expert = $request->get('expert');
        $profile->profession = $request->get('profession');
        $profile->telephone = $request->get('telephone');
        $profile->email = $request->get('email');
        $profile->address = $request->get('address');
        $profile->aboutMe = $request->get('aboutMe');
        $profile->whatsapp = $request->get('whatsapp');
        $profile->telegram = $request->get('telegram');
        $profile->twitter = $request->get('twitter');
        $profile->instagram = $request->get('instagram');

        if($profile->save())
            $request->session()->flash('profile','2');

        return to_route('admin.profile.index');
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
