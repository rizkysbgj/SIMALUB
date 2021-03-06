<?php

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

//Route LOGIN
    Route::get('/login', function () {
        return view('login');
    });

//Route untuk manager teknis
    
    Route::group(['middleware' => ['rule1']], function(){
        //Dashboard Top Manajemen
        Route::get('/halamandashboardTopManagement', 'DashboardTopManagementController@indexDashboardTopManagement') -> name('halamandashboardTopManagement');
        Route::get('/halamanUraian', 'DashboardTopManagementController@indexHalamanUraian') -> name('halamanUraian');
        //Dashboard Manajer Teknis
        Route::get('/', 'DashboardMTController@indexDashboardMT') -> name('halamandashboardMT');
        Route::get('/dashboardmanajerteknis/{IDProyek}', 'DashboardMTController@detailDashboardMT')->name('dashboardmanajerteknis.detailDashboardMT');
    });

    Route::group(['middleware' => ['rule2']], function(){
        //Dashboard Performa Analis
        Route::get('/halamandashboardPerformaAnalis', 'DashboardPerformaAnalisController@indexDashboardPerformaAnalis') -> name('halamandashboardPerformaAnalis');     
        //Route Pinned Project
        Route::get('/halamanpinnedProject/{IDProyek}', 'PinnedProjectController@indexPinned') -> name('halamanPinned');
        Route::get('/halamanpinnedProject/TaskList/{IDProyek}', 'PinnedProjectController@taskList')->name('halamanPinned.taskList');
        Route::get('/halamanpinnedProject/detailTask/{IDTugas}', 'PinnedProjectController@detailTask')->name('halamanPinned.detailTask');
        //Route Halaman Tugas Saya
        Route::get('/halamanTugasSaya', 'HalamanTugasSayaController@indexHalamanTugasSaya') -> name('halamanTugasSaya');
        Route::get('/halamanTugasSaya/TaskList', 'HalamanTugasSayaController@taskList')->name('halamanTugasSaya.taskList');
        Route::get('/halamanTugasSaya/detailTask/{IDTugas}', 'HalamanTugasSayaController@detailTask')->name('halamanTugasSaya.detailTask');
    });

    Route::group(['middleware' => ['rule3']], function(){
        //Route proyek 
        Route::get('/halamanProject', 'ProjectController@indexProject') -> name('halamanProject');
        Route::get('/halamanProject/tambahProject', 'ProjectController@createProject') -> name('halamanProject.tambahProject');
        Route::get('/editProject/{IDProyek}', 'ProjectController@editProject');
        //Route tugas
        Route::get('/halamanTugas/{IDProyek}', 'TugasController@indexTugas') -> name('halamanTugas');
        Route::get('/halamanTugas/tambahTugas/{IDProyek}', 'TugasController@createTugas') -> name('halamanTugas.tambahTugas');
        Route::get('/editTugas/{IDTugas}', 'TugasController@editTugas');
        //Route Laporan
        Route::get('/halamanLaporan', 'ProjectController@indexLaporan') -> name('halamanLaporan');
        //Route Sub Kontrak
        Route::get('/halamanSubkontrak/{IDProyek}', 'TugasController@indexSubkontrak') -> name('halamanSubkontrak');
        //Route staff dan user
        Route::get('/halamanStaff', 'StaffController@indexStaff') -> name('halamanStaff');
        Route::get('/halamanStaff/tambahStaff', 'StaffController@createStaff') -> name('halamanStaff.tambahStaff');
        Route::get('/editStaff/{IDUser}', 'StaffController@editStaff');
        Route::get('/editUser/{IDUser}', 'StaffController@editUser');
        //Route Jabatan
        Route::get('/halamanJabatan', 'JabatanController@indexJabatan') -> name('halamanJabatan');
        Route::get('/halamanJabatan/tambahJabatan', 'JabatanController@createJabatan') -> name('halamanJabatan.tambahJabatan');
        Route::get('/editJabatan/{IDRole}', 'JabatanController@editJabatan');
    });

    Route::group(['middleware' => ['rule4']], function(){
        //Route Pinned Project Administrasi
        Route::get('/halamanpinnedProjectAdministrasi', 'BuatSertifikatController@indexPinnedProjectAdministrasi') -> name('halamanpinnedProjectAdministrasi');
        Route::get('/halamanpinnedProjectAdministrasi/proyekList', 'BuatSertifikatController@proyekList')->name('halamanpinnedProjectAdministrasi.proyekList');
        Route::get('/halamanpinnedProjectAdministrasi/detailProyek/{IDProyek}', 'BuatSertifikatController@detailProyek')->name('halamanpinnedProjectAdministrasi.detailProyek');
    });

    Route::group(['middleware' => ['rule5']], function(){
        //Route Notifikasi
    Route::get('/notifikasi', 'HalamanTugasSayaController@notifikasi') -> name('notifikasi');
    });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
