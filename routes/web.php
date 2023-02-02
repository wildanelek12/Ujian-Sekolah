<?php

use App\Http\Controllers\SoalController;
use Illuminate\Support\Facades\Route;

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






Route::get('/soal', [SoalController::class, 'index']);






Auth::routes();


Route::group([
    'prefix'      => 'siswa',
  ], function () {
    Route::get('/', function () {
        return view('siswa.pages.dashboardSiswa');
    })->name("siswa.dashboard");

    Route::get('/kerjakan', function () {
        return view('siswa.pages.kerjakan');
    })->name("kerjakan");
  
});

Route::group([
    'prefix'      => 'guru',
  ], function () {
    Route::get('/', function () {
        return view('guru.pages.dashboardGuru');
    })->name("guru.dashboard");
    
  
});

Route::group([
    'prefix'      => 'admin',
  ], function () {
    Route::get('/', function () {
        return view('admin.pages.dashboard');
    })->name("admin.dashboard");
    Route::get('/guru', function () {
        return view('admin.pages.guru');
    })->name("admin.guru");
    
    Route::get('/kelas', function () {
        return view('admin.pages.kelas');
    })->name("admin.kelas");
    
    Route::get('/mapel', function () {
        return view('admin.pages.mapel');
    })->name("admin.mapel");
    
    Route::get('/siswa', function () {
        return view('admin.pages.siswa');
    })->name("admin.siswa");
    
    Route::get('/ujian', function () {
        return view('admin.pages.ujian');
    })->name("admin.ujian");
  
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
