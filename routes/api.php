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

Route::post('user', 'mstUserController@CreateUser');
Route::get('user/{IDUser}', 'mstUserController@GetUser');
Route::get('user', 'mstUserController@GetListUser');
Route::put('user', 'mstUserController@UpdateUser');

Route::post('role', 'mstRoleController@CreateRole');
Route::get('role', 'mstRoleController@GetListRole');
Route::get('role/{IDRole}', 'mstRoleController@GetRole');
Route::put('role', 'mstUserController@UpdateRole');

Route::post('proyek', 'mstProyekController@CreateProyek');
Route::get('proyek', 'mstProyekController@GetListProyek');
Route::get('proyek/{IDProyek}', 'mstProyekController@GetProyek');
Route::put('proyek', 'mstProyekController@UpdateProyek');

Route::post('tugas', 'mstTugasController@CreateTugas');
Route::get('tugas', 'mstTugasController@GetListTugas');
Route::get('tugas/{IDTugas}', 'mstTugasController@GetTugas');
Route::put('tugashomecontroller', 'mstTugasController@UpdateTugas');

Route::post('subkontrak', 'SubKontrakControler@CreateSubKontrak');
Route::get('subkontrak', 'SubKontrakControler@GetListSubKontrak');
Route::get('subkontrak/{IDSubKontrak}', 'SubKontrakControler@GetSubKontrak');
Route::put('subkontrak', 'SubKontrakControler@UpdateSubKontrak');