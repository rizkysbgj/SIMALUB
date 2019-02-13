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

Route::post('user', 'ControllersApi\UserController@CreateUser');
Route::get('user/{IDUser}', 'ControllersApi\UserController@GetUser');
Route::get('user/list/{IDRole}', 'ControllersApi\UserController@GetListUser');
Route::put('user', 'ControllersApi\UserController@UpdateUser');

Route::post('role', 'ControllersApi\RoleController@CreateRole');
Route::get('role', 'ControllersApi\RoleController@GetListRole');
Route::get('role/{IDRole}', 'ControllersApi\RoleController@GetRole');
Route::put('role', 'ControllersApi\RoleController@UpdateRole');

Route::post('proyek', 'ControllersApi\ProyekController@CreateProyek');
Route::get('proyek', 'ControllersApi\ProyekController@GetListProyek');
Route::get('proyek/{IDProyek}', 'ControllersApi\ProyekController@GetProyek');
Route::put('proyek', 'ControllersApi\ProyekController@UpdateProyek');

Route::post('tugas', 'ControllersApi\TugasController@CreateTugas');
Route::get('tugas/list/{IDProyek}', 'ControllersApi\TugasController@GetListTugas');
Route::get('tugas/{IDTugas}', 'ControllersApi\TugasController@GetTugas');
Route::put('tugas', 'ControllersApi\TugasController@UpdateTugas');

Route::post('subkontrak', 'ControllersApi\SubKontrakController@CreateSubKontrak');
Route::get('subkontrak', 'ControllersApi\SubKontrakController@GetListSubKontrak');
Route::get('subkontrak/{IDSubKontrak}', 'ControllersApi\SubKontrakController@GetSubKontrak');
Route::put('subkontrak', 'ControllersApi\SubKontrakController@UpdateSubKontrak');