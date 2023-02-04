<?php

namespace App\Http\Controllers;

use App\Imports\SoalImport;
use App\Models\Soal;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SoalController extends Controller
{
    public function index()
    {
        $soals = Soal::get();
        return view('soal', compact('soals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $validated = $request->validate([
            'soal' => 'required',
            'opsi_a' => 'required',
            'opsi_b' => 'required',
            'opsi_c' => 'required',
            'opsi_d' => 'required',
            'opsi_e' => 'required',
        ]);
        Soal::create([
            'soal' =>  $request->soal,
            'opsi_a' =>  $request->opsi_a,
            'opsi_b' =>  $request->opsi_b,
            'opsi_c' =>  $request->opsi_c,
            'opsi_d' =>  $request->opsi_d,
            'opsi_e' =>  $request->opsi_e,
            'mapel_id'  => $id,
            'key'   => $request->key
        ]);
        return redirect()->back()->with('success', 'Berhasil Menambahkan Soal');
    }
    public function createSoalFromExcel(Request $request)
    {
        $validated = $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('file_soal', $nama_file);

        // import data
        Excel::import(new SoalImport($request->mapel_id), public_path('/file_soal/' . $nama_file));

        return redirect()->back()->with('success', 'Berhasil Menambahkan Soal');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function show(Soal $soal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function edit(Soal $soal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Soal $soal)
    {
        
        $validated = $request->validate([
            'soal' => 'required',
            'opsi_a' => 'required',
            'opsi_b' => 'required',
            'opsi_c' => 'required',
            'opsi_d' => 'required',
            'opsi_e' => 'required',
        ]);
        $soal->update([
            'soal' =>  $request->soal,
            'opsi_a' =>  $request->opsi_a,
            'opsi_b' =>  $request->opsi_b,
            'opsi_c' =>  $request->opsi_c,
            'opsi_d' =>  $request->opsi_d,
            'opsi_e' =>  $request->opsi_e,
            'key'   => $request->key
        ]);
        return redirect()->back()->with('success', 'Berhasil Mengupdate Soal');;
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Soal $soal)
    {
        $soal->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data Soal');
        //
    }
}
