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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/complaints', 'ComplaintController@index');
Route::get('/complaints/{client}', 'ComplaintController@getComplaintByClient');
Route::post('/complaints', 'ComplaintController@store');
Route::patch('/complaints/{complaint}', 'ComplaintController@getComplaintInWork');


Route::get('/client', 'ClientController@index');
Route::post('/client', 'ClientController@store');