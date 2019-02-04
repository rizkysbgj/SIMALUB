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
    //Route nyoba
    Route::get('/', function () {
        return view('manajerTeknis.layout.index');
    });
    //Route dashboard manajer teknis
    Route::get('/halamandashboardMT', function () {
        return view('manajerTeknis.layout.page.dashboardMT.halamandashboardMT');
    });

    //Route proyek manajer teknis
    Route::get('/halamanProject', function () {
        return view('manajerTeknis.layout.page.project.halamanProject');
    });
    Route::get('/editProject', function () {
        return view('manajerTeknis.layout.page.project.editProject');
    });

    //Route staff
    Route::get('/halamanStaff', function () {
        return view('manajerTeknis.layout.page.staff.halamanStaff');
    });
    Route::get('/tambahStaff', function () {
        return view('manajerTeknis.layout.page.staff.tambahStaff');
    });
    Route::get('/editStaff', function () {
        return view('manajerTeknis.layout.page.staff.editStaff');
    });

    //Route Jabatan
    Route::get('/halamanJabatan', function () {
        return view('manajerTeknis.layout.page.jabatan.halamanJabatan');
    });
    Route::get('/tambahJabatan', function () {
        return view('manajerTeknis.layout.page.jabatan.tambahJabatan');
    });
    Route::get('/editJabatan', function () {
        return view('manajerTeknis.layout.page.jabatan.editJabatan');
    });

    //Route Pinned Project
    Route::get('/halamanpinnedProject', function () {
        return view('manajerTeknis.layout.page.pinnedProject.halamanpinnedProject');
    });
    Route::get('/detailTugas', function () {
        return view('manajerTeknis.layout.page.pinnedProject.detailTugas');
    });

