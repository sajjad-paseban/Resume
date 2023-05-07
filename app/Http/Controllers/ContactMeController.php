<?php

namespace App\Http\Controllers;

use App\Models\contact_me;
use Illuminate\Http\Request;

class ContactMeController extends Controller
{
    public function __construct(){
        $this->middleware('authLogin',['except'=>['store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = contact_me::orderBy('id','desc')->get();
        return view('admin.pages.contact.index',compact('contacts'));
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
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required|min:11|max:11',
            'message'=>'required'
        ],
        [
            'name.required'=>'فیلد نام و نام خانوادگی خالی می باشد',
            'message.required'=>'فیلد پیام خالی می باشد',
            'email.required'=>'فیلد پست الکترونیک خالی می باشد',
            'email.email'=>'پست الکترونیکی درست نمی باشد',
            'phone.required'=>'فیلد شماره تماس خالی می باشد',
            'phone.min'=>'حداقل طول شماره تماس 11 رقم می باشد',
            'phone.max'=>'حداکثر طول شماره تماس 11 رقم می باشد'
        ]);

        if(contact_me::create($request->except('_token')))
            $request->session()->flash('contact','1');

        return redirect('/');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(contact_me::destroy($id))
            session()->flash('contact','0');

        return to_route('admin.contact.index');

    }
}
