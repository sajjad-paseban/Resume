<?php

use App\Models\contact_me;
use App\Models\portfoilo;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/protfoilo/{id}',function($id){
    if($id == 0)
        return response()->json(
            DB::table('portfolio')->
            join('portfoilo_category','portfolio.categorey_id','=','portfoilo_category.id')->
            select('portfolio.*','portfoilo_category.title as categoryTitle')->get()
        );
    else
        return response()->json(
            DB::table('portfolio')->
            where('categorey_id',$id)->
            join('portfoilo_category','portfolio.categorey_id','=','portfoilo_category.id')->
            select('portfolio.*','portfoilo_category.title as categoryTitle')->get()
        );
});

Route::get('/contact',function(){
    return Response()->json(contact_me::orderBy('id','desc')->get()->take(3));
});

Route::get('/admin/profile',function(){
    return Response()->json(Profile::find(1));
});
