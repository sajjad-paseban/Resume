<?php

namespace App\Http\Controllers;

use App\Models\Client;
use File;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientsList = Client::all();
        return view('admin.pages.clients.index',compact('clientsList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.clients.create');
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
            ],
            [
                'title.required'=>'فیلد عنوان خالی می باشد'
            ]
        );


        $client = new Client;
        $client->title = $request->get('title');
        $client->link = $request->get('link');
        if($request->file('image_path')){
            $filename = Date('Y-m-d-H-i-s-').$request->file('image_path')->getClientOriginalName();
            $request->file('image_path')->move('tmp/clients/',$filename);
            $client->image_path = $filename;
        }
        $client->description = $request->get('description');

        if($client->save())
            $request->session()->flash('clients','1');

        return redirect(route('admin.clients.index'));
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
        $client = Client::find($id);
        return view('admin.pages.clients.edit',compact('client'));
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
            ],
            [
                'title.required'=>'فیلد عنوان خالی می باشد'
            ]
        );


        $client = Client::find($id);
        $client->title = $request->get('title');
        $client->link = $request->get('link');
        if($request->file('image_path')){
            if($client->image_path)
                File::delete('tmp/clients/'.$client->image_path);

            $filename = Date('Y-m-d-H-i-s-').$request->file('image_path')->getClientOriginalName();
            $request->file('image_path')->move('tmp/clients/',$filename);
            $client->image_path = $filename;
        }
        $client->description = $request->get('description');

        if($client->save())
            $request->session()->flash('clients','2');

        return redirect(route('admin.clients.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        if($client->image_path)
            File::delete('tmp/clients/'.$client->image_path);

        if(Client::destroy($id))
            session()->flash('clients','0');


        return redirect(route('admin.clients.index'));
    }
}
