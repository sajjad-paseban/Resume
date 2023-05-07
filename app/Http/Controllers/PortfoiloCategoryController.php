<?php

namespace App\Http\Controllers;

use App\Models\portfoilo_category;
use Exception;
use Illuminate\Http\Request;

class PortfoiloCategoryController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'color'=>'required'
        ],
        [
            'title.required'=>'فیلد عنوان خالی می باشد',
            'color.required'=>'فیلد رنگ نوار دسته بندی خالی می باشد'
        ]);

        $portfoiloCategorey = new portfoilo_category;
        $portfoiloCategorey->title = $request->get('title');
        $portfoiloCategorey->color = $request->get('color');
        if($portfoiloCategorey->save())
            $request->session()->flash('portfoilo_categorey','1');

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
        try{
            if(portfoilo_category::destroy($id))
                session()->flash('portfoilo_categorey','0');

        }catch(Exception $ex){
            session()->flash('portfoilo_categorey',[-1,$ex->getMessage()]);
        }

        return to_route('admin.portfoilo.index');
    }
}
