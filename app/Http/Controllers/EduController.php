<?php

namespace App\Http\Controllers;

use App\Models\Edu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EduController extends Controller
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
        $educationList = Edu::all();
        return view('admin.pages.education.index',compact('educationList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.education.create');
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
            'universityName'=>'required',
            'fieldOfStudy'=>'required',
            'from'=>'required'
        ],
        [
            'universityName.required'=>'فیلد نام دانشگاه خالی می باشد',
            'fieldOfStudy'=> 'فیلد مقطع و رشته تحصیلی خالی می باشد',
            'from'=> 'فیلد از سال خالی می باشد'
        ]);

        $edu = new Edu;
        $edu->universityName = $request->get('universityName');
        $edu->fieldOfStudy = $request->get('fieldOfStudy');
        $edu->from = $request->get('from');
        $edu->to = $request->get('to');
        $edu->description = $request->get('description');
        if($edu->save())
            $request->session()->flash('edu','1');

        return redirect(route('admin.education.index'));
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
        $edu = Edu::find($id);
        return view('admin.pages.education.edit',compact('edu'));
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
            'universityName'=>'required',
            'fieldOfStudy'=>'required',
            'from'=>'required'
        ],
        [
            'universityName.required'=>'فیلد نام دانشگاه خالی می باشد',
            'fieldOfStudy'=> 'فیلد مقطع و رشته تحصیلی خالی می باشد',
            'from'=> 'فیلد از سال خالی می باشد'
        ]);

        $edu = Edu::find($id);

        $edu->universityName = $request->get('universityName');
        $edu->fieldOfStudy = $request->get('fieldOfStudy');
        $edu->from = $request->get('from');
        $edu->to = $request->get('to');
        $edu->description = $request->get('description');
        if($edu->save())
            $request->session()->flash('edu','2');


        return redirect(route('admin.education.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Edu::destroy($id))
            session()->flash('edu','0');

        return redirect(route('admin.education.index'));
    }
}
