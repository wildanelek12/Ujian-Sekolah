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

Route::get('/', function () {
    return view('admin.pages.dashboard');
})->name("dashboard");

Route::get('/guru', function () {
    return view('admin.pages.guru');
<<<<<<< Updated upstream
})->name("guru");

Route::get('/kelas', function () {
    return view('admin.pages.kelas');
})->name("kelas");

Route::get('/mapel', function () {
    return view('admin.pages.mapel');
})->name("mapel");

Route::get('/siswa', function () {
    return view('admin.pages.siswa');
})->name("siswa");

Route::get('/ujian', function () {
    return view('admin.pages.ujian');
})->name("ujian");
=======
});

Route::get('/soal', [SoalController::class, 'index']);
>>>>>>> Stashed changes
