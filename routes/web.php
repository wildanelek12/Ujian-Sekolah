<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Soal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
    'middleware' => 'siswa'
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
    'middleware' => 'guru'
], function () {
    Route::get('/', function () {
        $datas = Mapel::where('user_id', Auth::user()->id)->get();
        return view('guru.pages.dashboard', compact('datas'));
    })->name("guru.dashboard");
    Route::get('/mapel/{id}', function ($id) {
        $datas = Soal::where('mapel_id', $id)->get();
        return view('guru.pages.list_soal', compact('datas', 'id'));
    })->name("guru.listSoal");
    Route::post('/soal/import-excel', [SoalController::class, 'createSoalFromExcel'])->name('guru.soal.storeExcel');
    Route::get('/hasil', function () {
        return view('guru.pages.hasil_ujian');
    })->name("guru.hasil");
    Route::get('/mapel/{id}/create', function ($id) {
        return view('guru.pages.create_soal', compact('id'));
    })->name("guru.create");
    Route::post('/mapel/{id}', [SoalController::class, 'store'])->name('guru.soal.store');

    Route::get('/update', function () {
        return view('guru.pages.update_soal');
    })->name("guru.update");
    Route::get('/view', function () {
        return view('guru.pages.lihat_hasil');
    })->name("guru.view");
});

Route::group([
    'prefix'      => 'admin',
    'middleware' => 'admin'
], function () {
    Route::get('/', function () {
        return view('admin.pages.dashboard');
    })->name("admin.dashboard");

    Route::get('/guru', function () {
        $datas = User::where('role', 2)->get();
        return view('admin.pages.guru', compact('datas'));
    })->name("admin.guru");
    Route::post('/guru', [UserController::class, 'createGuru'])->name('admin.guru.store');
    Route::get('/guru/{id}/edit', function ($id) {
        $data = User::where('id', $id)->first();
        return view('admin.pages.update_guru', compact('data'));
    })->name("admin.guru.edit");
    Route::put('/guru/{id}', [UserController::class, 'updateGuru'])->name('admin.guru.update');
    Route::delete('/guru/{id}', [UserController::class, 'deleteGuru'])->name('admin.guru.delete');


    Route::get('/kelas', function () {
        $kelas = Kelas::all();
        $total_kelas = [];
        foreach ($kelas as $key) {
            $total_user = User::where('kelas_id', $key->id)->count();
            $total_kelas[$key->id] = $total_user;
        }
        return view('admin.pages.kelas', compact('kelas', 'total_kelas'));
    })->name("admin.kelas");
    Route::post('/kelas', [KelasController::class, 'store'])->name('admin.kelas.store');
    Route::get('/kelas/{id}/edit', function ($id) {
        $data = Kelas::where('id', $id)->first();
        return view('admin.pages.update_kelas', compact('data'));
    })->name("admin.kelas.edit");
    Route::put('/kelas/{kelas}', [KelasController::class, 'update'])->name('admin.kelas.update');
    Route::delete('/kelas/{kelas}', [KelasController::class, 'destroy'])->name('admin.kelas.delete');


    Route::get('/siswa', function () {
        $datas = User::where('role', 3)
            ->join("kelas", 'users.kelas_id', '=', 'kelas.id')
            ->select("users.*", "kelas.nama as kelas")
            ->get();
        $kelas = Kelas::all();
        return view('admin.pages.siswa', compact('datas', 'kelas'));
    })->name("admin.siswa");
    Route::post('/siswa', [UserController::class, 'createSiswa'])->name('admin.siswa.store');
    Route::post('/siswa/import-excel', [UserController::class, 'createSiswaFromExcel'])->name('admin.siswa.storeExcel');
    Route::get('/siswa/{id}/edit', function ($id) {
        $data = User::where('id', $id)->first();
        $kelas = Kelas::all();
        return view('admin.pages.update_siswa', compact('data', 'kelas'));
    })->name("admin.siswa.edit");
    Route::put('/siswa/{id}', [UserController::class, 'updateSiswa'])->name('admin.siswa.update');
    Route::delete('/siswa/{id}', [UserController::class, 'deleteSiswa'])->name('admin.siswa.delete');



    Route::resource('/mapel', MapelController::class);
    Route::resource('/ujian', UjianController::class);
});


// Route::get('/test', function () {
//     dd(bcrypt("12345678"));
// })->name("admin.ujian");

// Route::get('/soal', function () {
//     $soals = Soal::all();
//     return view('soal', compact('soals'));
// })->name("admin.ujian");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
