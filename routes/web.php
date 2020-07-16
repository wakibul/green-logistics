<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::group(['prefix'=>'trucking',"as"=>'trucking.'],function(){
    Route::get('/create',[
        'as'=>'create',
        'uses'=>'User\TruckingController@create'
    ]);
    Route::post('/store',[
        'as'=>'store',
        'uses'=>'User\TruckingController@store'
    ]);
    Route::get('/edit/{id}',[
        'as'=>'edit',
        'uses'=>'User\TruckingController@edit'
    ]);
    Route::POST('/update/{id}',[
        'as'=>'update',
        'uses'=>'User\TruckingController@update'
    ]);
    Route::get('/index',[
        'as'=>'index',
        'uses'=>'User\TruckingController@index'
    ]);
    Route::get('/delete/{id}',[
        'as'=>'delete',
        'uses'=>'User\TruckingController@destroy'
    ]);
});
Route::get('/add-trucking-info', 'User/TruckingController@create')->name('user.trucking.add_trucking');
