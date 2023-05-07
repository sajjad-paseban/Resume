<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\BiographyController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ContactMeController;
use App\Http\Controllers\EduController;
use App\Http\Controllers\ExpController;
use App\Http\Controllers\PortfoiloCategoryController;
use App\Http\Controllers\PortfoiloController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SkillsController;
use App\Models\Bio;
use App\Models\contact_me;
use App\Models\Edu;
use App\Models\experience;
use App\Models\portfoilo;
use App\Models\portfoilo_category;
use App\Models\Profile;
use App\Models\Services;
use App\Models\Skills;
use App\Models\Client;
use App\Models\visit;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// =======           HOME             =======
Route::get('/', function () {

    $edu = Edu::all();
    $exp = experience::all();
    $skills = Skills::all();
    $services = Services::all();
    $clients = Client::all();
    $profile = Profile::find(1);
    $bio = Bio::all();
    $portfoilo_categorey = portfoilo_category::all();
    $portfoilo = portfoilo::all()->count();


    return view('index',compact('edu','exp','skills','services','clients','profile','bio','portfoilo_categorey','portfoilo'));
})->name('home')->middleware('visit');
// =======           HOME             =======

// =======           LOGIN             =======
Route::get('/login',function(){
    return view('pages.login');
})->name('login')->middleware('authNotLogin');
Route::post('/login',function(){
    $validator = Validator::make(request()->all(), [
        "username" => 'required',
        "password" => 'required'
        ],[
            'username.required'=>'فیلد نام کاربری خالی می باشد',
            'password.required'=>'فیلد گذرواژه خالی می باشد'
            ]);

            if($validator->fails())
        return to_route('login')->withErrors($validator);

    session()->put('user',
    ['status'=> true]
    );

    return to_route('admin.dashboard');

})->name('login.check')->middleware('authNotLogin');
// =======           LOGIN             =======

// =======           LOGOUT             =======
Route::get('/logout',function(){
    session()->flush();
    return to_route('login');
})->name('logout')->middleware('authLogin');
// =======           LOGOUT             =======

// =======           ADMIN             =======
Route::group([
    'prefix'=> '/administrator',
    'as'=> 'admin.'

    ],function(){
        Route::get('',function(){

            $visit_count = visit::count();
            $messages_count = contact_me::count();
            $cliens_count = client::count();
            $services_count = Services::count();
            $skills = Skills::orderBy('id','desc')->get()->take(4);
            $profile = Profile::find(1);
            $educations = Edu::orderBy('id','desc')->get()->take(4);
            $portfoilo = portfoilo::orderBy('id','desc')->get()->take(4);
            $messages = contact_me::orderBy('id','desc')->get()->take(4);


            return view('admin.pages.dashboard',compact('visit_count','messages_count','cliens_count','services_count','skills','profile','educations','portfoilo','messages'));
    })->name('dashboard')->middleware('authLogin');
    Route::resource("contact",ContactMeController::class);
    Route::resource("profile",ProfileController::class);
    Route::resource("education",EduController::class);
    Route::resource("experience",ExpController::class);
    Route::resource("skills",SkillsController::class);
    Route::resource("services",ServicesController::class);
    Route::resource("clients",ClientsController::class);
    Route::resource("portfoilo",PortfoiloController::class);
    Route::resource("articles",ArticlesController::class);
    Route::resource("bio",BiographyController::class);
    Route::resource("portifoilo-categorey",PortfoiloCategoryController::class);
});
// =======           ADMIN             =======
