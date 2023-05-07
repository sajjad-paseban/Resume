<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
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
        $servicesList = Services::all();
        return view('admin.pages.services.index',compact('servicesList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.services.create');
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
            'price'=>'required',
        ],
        [
            'title.required'=>'فیلد عنوان خدمات خالی می باشد',
            'price.required'=>'فیلد شروع مبلغ خالی می باشد',
        ]);

        $service = new Services;
        $service->title = $request->get('title');
        $service->price = str_replace(',','',$request->get('price'));
        $service->description = $request->get('description');
        if($service->save())
            $request->session()->flash('services','1');


        return redirect(route('admin.services.index'));
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
        $service = Services::find($id);
        return view('admin.pages.services.edit',compact('service'));
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
            'price'=>'required',
        ],
        [
            'title.required'=>'فیلد عنوان خدمات خالی می باشد',
            'price.required'=>'فیلد شروع مبلغ خالی می باشد',
        ]);

        $service = Services::find($id);
        $service->title = $request->get('title');
        $service->price = str_replace(',','',$request->get('price'));
        $service->description = $request->get('description');
        if($service->save())
            $request->session()->flash('services','2');


        return redirect(route('admin.services.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Services::destroy($id))
            session()->flash('services','0');

        return redirect(route('admin.services.index'));

    }
}
