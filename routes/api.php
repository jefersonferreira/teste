<?php

use Illuminate\Http\Request;

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

Route::post('register', 'Auth\RegisterController@register');

Route::get('users', 'UserController@index');

Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('collaborators', 'CollaboratorController@index');
    Route::get('collaborators/{collaborator}', 'CollaboratorController@show');
    Route::post('collaborators', 'CollaboratorController@store');
    Route::put('collaborators/{collaborator}', 'CollaboratorController@update');
    Route::delete('collaborators/{collaborator}', 'CollaboratorController@delete');

    Route::get('sectors', 'SectorController@index');
    Route::get('sectors/{collaborator}', 'SectorController@show');
    Route::post('sectors', 'SectorController@store');
    Route::put('sectors/{sector}', 'SectorController@update');
    Route::delete('sectors/{sector}', 'SectorController@delete');
});
