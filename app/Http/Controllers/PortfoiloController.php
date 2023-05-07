<?php

namespace App\Http\Controllers;

use App\Models\portfoilo;
use App\Models\portfoilo_category;
use File;
use Illuminate\Http\Request;

class PortfoiloController extends Controller
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
        $portfoilo_categorey = portfoilo_category::all();
        $portfoilo = portfoilo::all();
        return view('admin.pages.portfoilo.index',compact('portfoilo_categorey','portfoilo'));
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
            'title'=>'required',
            'categorey_id'=>'required',
            'image_sample'=>'required',
        ],[
            'title.required'=>'فیلد عنوان خالی می باشد',
            'categorey_id.required'=>'گزینه از دسته بندی انتخاب نشده است',
            'image_sample.required'=>'تصویری آپلود نشده است'
        ]);


        $portfoilo = new portfoilo;
        $portfoilo->title = $request->get('title');
        $portfoilo->categorey_id = $request->get('categorey_id');

        if($request->file('image_sample')){
            $filename = Date('Y-m-d-H-i-s-').$request->file('image_sample')->getClientOriginalName();
            $request->file('image_sample')->move('tmp/portfoilo/',$filename);
            $portfoilo->image_path = $filename;
        }
        if($portfoilo->save())
            $request->session()->flash('portfoilo','1');

        return to_route('admin.portfoilo.index');
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
        $portfoilo = portfoilo::find($id);
        if(File::exists("tmp/portfoilo/".$portfoilo->image_path))
            File::delete("tmp/portfoilo/".$portfoilo->image_path);

        if(portfoilo::destroy($id))
            session()->flash('portfoilo','0');


        return to_route('admin.portfoilo.index');
    }
}
