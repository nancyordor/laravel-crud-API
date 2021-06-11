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
Route::get('employees', 'App\Http\Controllers\ApiController@getAllEmployees');
Route::get('employees/{id}', 'App\Http\Controllers\ApiController@getEmployee');
Route::post('employees', 'App\Http\Controllers\ApiController@createEmployee');
Route::put('employees/{id}', 'App\Http\Controllers\ApiController@updateEmployee');
Route::delete('employees/{id}','App\Http\Controllers\ApiController@deleteEmployee');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
