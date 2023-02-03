<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Ujian;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UjianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Ujian::join('mapels', 'ujians.mapel_id', '=', 'mapels.id')
            ->join('kelas', 'ujians.kelas_id', '=', 'kelas.id')
            ->select('ujians.*', 'mapels.nama as mapel', 'kelas.nama as kelas')
            ->get();
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        return view('admin.pages.ujian', compact('datas', 'kelas', 'mapel'));
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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'waktu_mulai' => 'required|max:255',
            'waktu_selesai' => 'required|max:255',
        ]);
        Ujian::create([
            'mapel_id' => $request->mapel_id,
            'kelas_id' => $request->kelas_id,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'token' => Str::random(5),
        ]);
        return redirect()->back()->with('success', 'Berhasil Menambahkan Ujian');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ujian  $ujian
     * @return \Illuminate\Http\Response
     */
    public function show(Ujian $ujian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ujian  $ujian
     * @return \Illuminate\Http\Response
     */
    public function edit(Ujian $ujian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ujian  $ujian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ujian $ujian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ujian  $ujian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ujian $ujian)
    {
        $ujian->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data Ujian');
    }
}
