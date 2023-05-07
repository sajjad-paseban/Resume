<?php

namespace App\Http\Controllers;

use App\Models\Skills;
use Illuminate\Http\Request;

class SkillsController extends Controller
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
        $skillsList = Skills::all();
        return view('admin.pages.skills.index',compact('skillsList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.skills.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
        [
            'title'=>'required',
            'percentage'=>'required'
        ],
        [
            'title.required'=>'فیلد عنوان خالی می باشد',
            'percentage.required'=>'فیلد سطح مهارت خالی می باشد'
        ]);

        $skills = new Skills;
        $skills->title = $request->get('title');
        $skills->percentage = $request->get('percentage');
        if($skills->save())
            $request->session()->flash('skill','1');

        return redirect(route('admin.skills.index'));
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
        $skill = Skills::find($id);
        return view('admin.pages.skills.edit',compact('skill'));
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
        $request->validate(
        [
            'title'=>'required',
            'percentage'=>'required'
        ],
        [
            'title.required'=>'فیلد عنوان خالی می باشد',
            'percentage.required'=>'فیلد سطح مهارت خالی می باشد'
        ]);

        $skills = Skills::find($id);
        $skills->title = $request->get('title');
        $skills->percentage = $request->get('percentage');
        if($skills->save())
            $request->session()->flash('skill','2');

        return redirect(route('admin.skills.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Skills::destroy($id))
            session()->flash('skill','0');

        return redirect(route('admin.skills.index'));
    }
}
