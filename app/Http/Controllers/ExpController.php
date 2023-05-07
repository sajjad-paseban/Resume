<?php

namespace App\Http\Controllers;

use App\Models\experience;
use Illuminate\Http\Request;

class ExpController extends Controller
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
        $experienceList = experience::all();
        return view('admin.pages.experience.index',compact('experienceList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.experience.create');
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
            'companyName'=>'required',
            'role'=>'required',
            'from'=>'required',
        ],
        [
            'companyName.required'=>'فیلد نام شرکت خالی می باشد',
            'role.required'=>'فیلد نقش خالی می باشد',
            'from.required'=>'فیلد از سال خالی می باشد',
        ]);

        $exp = new experience;
        $exp->companyName = $request->get('companyName');
        $exp->role = $request->get('role');
        $exp->from = $request->get('from');
        $exp->to = $request->get('to');
        $exp->description = $request->get('description');

        if($exp->save())
            $request->session()->flash('exp','1');


        return redirect(route('admin.experience.index'));
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
        $exp = experience::find($id);
        return view('admin.pages.experience.edit',compact('exp'));
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
            'companyName'=>'required',
            'role'=>'required',
            'from'=>'required',
        ],
        [
            'companyName.required'=>'فیلد نام شرکت خالی می باشد',
            'role.required'=>'فیلد نقش خالی می باشد',
            'from.required'=>'فیلد از سال خالی می باشد',
        ]);

        $exp = experience::find($id);
        $exp->companyName = $request->get('companyName');
        $exp->role = $request->get('role');
        $exp->from = $request->get('from');
        $exp->to = $request->get('to');
        $exp->description = $request->get('description');

        if($exp->save())
            $request->session()->flash('exp','2');

        return to_route('admin.experience.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(experience::destroy($id))
            session()->flash('exp','0');

        return redirect(route('admin.experience.index'));
    }
}
