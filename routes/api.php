<?php

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

Route::group(['prefix' => 'master'], function () {
    Route::GET('countries',[
        'uses' => 'Api\Master\CountryController@index'
    ]);
    Route::GET('vehicle-types',[
        'uses' => 'Api\Master\MasterController@vehicleTypes'
    ]);
    Route::GET('fuel-types',[
        'uses' => 'Api\Master\MasterController@fuelTypes'
    ]);
    Route::GET('vehicle-weight',[
        'uses' => 'Api\Master\MasterController@vehicleWeight'
    ]);
});
Route::group(['prefix' => 'user'], function () {
    Route::POST('login',[
        'uses' => 'Api\User\AuthController@login'
    ]);
    Route::POST('register',[
        'uses' => 'Api\User\AuthController@register'
    ]);
});
Route::group(['prefix' => 'trucking'], function () {
    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::POST('store',[
            'uses' => 'Api\Trucking\TruckingController@store'
        ]);

        Route::GET('show/{id}',[
            'uses' => 'Api\Trucking\TruckingController@show'
        ]);

        Route::GET('index',[
            'uses' => 'Api\Trucking\TruckingController@index'
        ]);

        Route::POST('update/{id}',[
            'uses' => 'Api\Trucking\TruckingController@update'
        ]);
    });
});
