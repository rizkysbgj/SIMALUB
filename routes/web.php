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
    
    Route::group(['middleware' => ['auth']], function(){
        //Route dashboard manajer teknis
        Route::get('/', 'DashboardMTController@indexDashboardMT') -> name('halamandashboardMT');
        Route::get('/dashboardmanajerteknis/{IDProyek}', 'DashboardMTController@detailDashboardMT')->name('dashboardmanajerteknis.detailDashboardMT');

        //Route dashboard manajer teknis
        Route::get('/halamandashboardTopManagement', 'DashboardTopManagementController@indexDashboardTopManagement') -> name('halamandashboardTopManagement');

        //Route proyek 
        Route::get('/halamanProject', 'ProjectController@indexProject') -> name('halamanProject');
        Route::get('/halamanProject/tambahProject', 'ProjectController@createProject') -> name('halamanProject.tambahProject');
        Route::get('/editProject/{IDProyek}', 'ProjectController@editProject');
        // Route laporan dari proyek
        Route::get('/halamanLaporan', 'ProjectController@indexLaporan') -> name('halamanLaporan');

        //Route tugas
        Route::get('/halamanTugas/{IDProyek}', 'TugasController@indexTugas') -> name('halamanTugas');
        Route::get('/halamanTugas/tambahTugas/{IDProyek}', 'TugasController@createTugas') -> name('halamanTugas.tambahTugas');
        Route::get('/editTugas/{IDTugas}', 'TugasController@editTugas');

        Route::get('/halamanSubkontrak/{IDProyek}', 'TugasController@indexSubkontrak') -> name('halamanSubkontrak');

        //Route staff
        Route::get('/halamanStaff', 'StaffController@indexStaff') -> name('halamanStaff');
        Route::get('/halamanStaff/tambahStaff', 'StaffController@createStaff') -> name('halamanStaff.tambahStaff');
        Route::get('/editStaff/{IDUser}', 'StaffController@editStaff');

        //Route Jabatan
        Route::get('/halamanJabatan', 'JabatanController@indexJabatan') -> name('halamanJabatan');
        Route::get('/halamanJabatan/tambahJabatan', 'JabatanController@createJabatan') -> name('halamanJabatan.tambahJabatan');
        Route::get('/editJabatan/{IDRole}', 'JabatanController@editJabatan');
    
        //Route Pinned Project
        Route::get('/halamanpinnedProject/{IDProyek}', 'PinnedProjectController@indexPinned') -> name('halamanPinned');
        Route::get('/halamanpinnedProject/TaskList/{IDProyek}', 'PinnedProjectController@taskList')->name('halamanPinned.taskList');
        Route::get('/halamanpinnedProject/detailTask/{IDTugas}', 'PinnedProjectController@detailTask')->name('halamanPinned.detailTask');
        
        //Route Pinned Project Administrasi
        Route::get('/halamanpinnedProjectAdministrasi', 'BuatSertifikatController@indexPinnedProjectAdministrasi') -> name('halamanpinnedProjectAdministrasi');
        Route::get('/halamanpinnedProjectAdministrasi/proyekList', 'BuatSertifikatController@proyekList')->name('halamanpinnedProjectAdministrasi.proyekList');
        Route::get('/halamanpinnedProjectAdministrasi/detailProyek/{IDProyek}', 'BuatSertifikatController@detailProyek')->name('halamanpinnedProjectAdministrasi.detailProyek');
        

        // Route::get('/detailTugas', function () {
        //     return view('manajerTeknis.layout.page.pinnedProject.detailTugas');
        // });
    });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
