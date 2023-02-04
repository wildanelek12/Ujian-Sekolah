<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Soal;
use App\Models\Ujian;
use App\Models\User;
use Illuminate\Http\Request;
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
        $datas = Ujian::where('kelas_id', Auth::user()->kelas_id)
            ->join('mapels', 'ujians.mapel_id', '=', 'mapels.id')
            ->leftJoin('results', 'results.ujian_id', '=', 'ujians.id')
            ->select('ujians.*', 'mapels.nama as mapel', 'mapels.deskripsi as deskripsi')
            ->get();
        $durasi = [];
        foreach ($datas as $key) {
            $waktu_mulai = new DateTime($key->waktu_mulai);
            $waktu_selesai = new DateTime($key->waktu_selesai);
            $interval = $waktu_selesai->diff($waktu_mulai);
            $min = $interval->days * 24 * 60;
            $min += $interval->h * 60;
            $min += $interval->i;
            $durasi[$key->id] = $min;
        }
        return view('siswa.pages.dashboard', compact('datas', 'durasi'));
    })->name("siswa.dashboard");

    Route::get('/ujian/{url}', function (Request $request, $url) {
        $datas = Soal::where('mapel_id', $request->id)->get();
        $waktu_mulai = $request->waktu_mulai;
        $waktu_selesai = $request->waktu_selesai;
        $ujian_id = $request->ujian_id;
        return view('siswa.pages.soal', compact('datas','waktu_mulai','waktu_selesai','ujian_id'));
    })->name("siswa.ujian");

    Route::post('/ujian', [ResultController::class, 'store'])->name('siswa.result.store');

    // Ubah Password
    Route::get('/ubahpassword', function () {
        return view('siswa.pages.ubah_password');
    })->name("siswa.change");
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

    Route::get('/mapel/{id}/edit', function ($id) {
        $data = Soal::where('id', $id)->first();
        return view('guru.pages.update_soal', compact('data'));
    })->name("guru.edit");
    Route::put('/mapel/soal/{soal}', [SoalController::class, 'update'])->name('guru.soal.update');
    Route::delete('/mapel/soal/{soal}', [SoalController::class, 'destroy'])->name('guru.soal.delete');

    Route::get('/view', function () {
        return view('guru.pages.lihat_hasil');
    })->name("guru.view");

    // Ubah Password
    Route::get('/ubahpassword', function () {
        return view('guru.pages.ubah_password');
    })->name("guru.change");
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

    // Ubah Password
    Route::get('/ubahpassword', function () {
        return view('admin.pages.ubah_password');
    })->name("admin.change");
});


// Route::get('/test', function () {
//     dd(bcrypt("12345678"));
// })->name("admin.ujian");

// Route::get('/soal', function () {
//     $soals = Soal::all();
//     return view('soal', compact('soals'));
// })->name("admin.ujian");

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');
