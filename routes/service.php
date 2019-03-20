<?php

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('user', 'ControllersApi\UserControllerApi@CreateUser');
Route::get('user/{IDUser}', 'ControllersApi\UserControllerApi@GetUser');
Route::get('user/list/{IDRole}', 'ControllersApi\UserControllerApi@GetListUser');
Route::put('user', 'ControllersApi\UserControllerApi@UpdateUser');
Route::delete('user/{IDUser}', 'ControllersApi\UserControllerApi@DeleteUser');

Route::post('role', 'ControllersApi\RoleControllerApi@CreateRole');
Route::get('role', 'ControllersApi\RoleControllerApi@GetListRole');
Route::get('role/{IDRole}', 'ControllersApi\RoleControllerApi@GetRole');
Route::put('role', 'ControllersApi\RoleControllerApi@UpdateRole');
Route::delete('role/{IDRole}', 'ControllersApi\RoleControllerApi@DeleteUser');

Route::post('proyek', 'ControllersApi\ProyekControllerApi@CreateProyek');
Route::get('proyek', 'ControllersApi\ProyekControllerApi@GetListProyek');
Route::get('proyek/{IDProyek}', 'ControllersApi\ProyekControllerApi@GetProyek');
Route::put('proyek', 'ControllersApi\ProyekControllerApi@UpdateProyek');
Route::delete('proyek/{IDProyek}', 'ControllersApi\ProyekControllerApi@DeteleProyek');

Route::post('tugas', 'ControllersApi\TugasControllerApi@CreateTugas');
Route::get('tugas/list/{IDProyek}', 'ControllersApi\TugasControllerApi@GetListTugas');
Route::get('tugas/{IDTugas}', 'ControllersApi\TugasControllerApi@GetTugas');
Route::put('tugas', 'ControllersApi\TugasControllerApi@UpdateTugas');
Route::get('tugas/detail/{IDTugas}', 'ControllersApi\TugasControllerApi@GetDetailTugas');
Route::delete('tugas/{IDTugas}', 'ControllersApi\TugasControllerApi@DeleteTugas');

Route::get('memo/{IDTugas}', 'ControllersApi\TugasControllerApi@GetListTrxTugas');

Route::get('tugas/administrasi/list/{IDProyek}', 'ControllersApi\TugasControllerApi@AdministrasiGetListTugas');
Route::post('tugas/administrasi', 'ControllersApi\TugasControllerApi@AdministrasiTransaction');
Route::get('tugas/administrasi/hasil/{IDProyek}', 'ControllersApi\TugasControllerApi@AdministrasiGetListTrxTugas');

Route::post('subkontrak', 'ControllersApi\SubKontrakControllerApi@CreateSubKontrak');
Route::get('subkontrak/{IDProyek}', 'ControllersApi\SubKontrakControllerApi@GetListSubKontrak');
Route::get('subkontrak/detail/{IDSubKontrak}', 'ControllersApi\SubKontrakControllerApi@GetSubKontrak');
Route::put('subkontrak', 'ControllersApi\SubKontrakControllerApi@UpdateSubKontrak');
Route::delete('subkontrak/{IDSubKontrak}', 'ControllersApi\SubKontrakControllerApi@DeleteSubKontrak');
Route::post('subkontrak/upload', 'ControllersApi\SubKontrakControllerApi@UploadHasil');
Route::get('subkontrak/download/{IDSubKontrak}', 'ControllersApi\SubKontrakControllerApi@DownloadHasil');
Route::post('pinned', 'ControllersApi\TugasControllerApi@TugasTransaction');

Route::post('lapor', 'ControllersApi\TugasControllerApi@CreateLaporTugas');
Route::get('lapor/{IDProyek}', 'ControllersApi\TugasControllerApi@GetListTrxLaporanTugas');
Route::get('lapor/detail/{IDTrxLapor}', 'ControllersApi\TugasControllerApi@GetDetailTrxLaporanTugas');
Route::delete('lapor/{IDTrxLapor}', 'ControllersApi\TugasControllerApi@DeleteLaporan');
Route::post('lapor/tindakan', 'ControllersApi\TugasControllerApi@TindakLaporan');
Route::get('download/laporan/{IDTrxLapor}', 'ControllersApi\TugasControllerApi@DownloadAttachmentLaporan');
Route::get('download/tindakan/{IDTrxLapor}', 'ControllersApi\TugasControllerApi@DownloadAttachmentTindakan');

Route::put('kajiulang', 'ControllersApi\TugasControllerApi@KajiUlang');
Route::get('kajiulang/{IDProyek}', 'ControllersApi\TugasControllerApi@GetListKajiUlang');
Route::delete('kajiulang/{IDProyek}', 'ControllersApi\TugasControllerApi@DeleteKajiUlang');

Route::get('dashboardmanajerteknis/{IDProyek}', 'ControllersApi\DashboardControllerApi@DashboardManajerTeknis');
Route::get('dashboardmanajerteknis/kesalahan/{IDProyek}', 'ControllersApi\DashboardControllerApi@GetKesalahanAnalisis');
Route::get('dashboardmanajerteknis/telat/{IDProyek}', 'ControllersApi\DashboardControllerApi@GetWaktuTerbuang');

Route::get('dashboardmanajerpuncak/{tahun}', 'ControllersApi\DashboardControllerApi@DashboardManajerPuncak');

Route::get('download/{IDTrxTugas}', 'ControllersApi\TugasControllerApi@DownloadAttachment');
Route::get('openTBS', 'ControllersApi\UserControllerApi@testTBS');

Route::get('export-docx/{templateName}', 'HelpersController@exportdocx');