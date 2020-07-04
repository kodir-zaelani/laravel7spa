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

Route::resource('categories', 'Api\CategoryController');
Route::post('/categories/store', 'Api\CategoryController@store');
// Route::get('/categories/{id?}', 'Api\CategoryController@show');
// Route::post('/categories/update/{id?}', 'Api\CategoryController@update');
// Route::delete('/categories/{id?}', 'Api\CategoryController@destroy');

// Route::post('login','Api\Auth\LoginController@login');

// Route::resource('/pegawai', 'Api\UserController');
