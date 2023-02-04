<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Guru;
use App\Models\Mapel;
use App\Models\User;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Mapel::join("users","mapels.user_id",'=',"users.id")->select("mapels.*","users.nama as guru")->get();
        $gurus = User::where("role","2")->get();

        return view('admin.pages.mapel',compact("gurus","datas"));
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
            'nama' => 'required|max:255|unique:mapels,nama',
            'deskripsi' => 'max:255',
        ]);
        Mapel::create([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'user_id' => $request->user_id,
        ]);
        return redirect()->back()->with('success', 'Berhasil Menambahkan Mata Pelajaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function show(Mapel $mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function edit(Mapel $mapel)
    {
        $gurus = User::where("role","2")->get();
        return view('admin.pages.update_mapel',compact('mapel','gurus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mapel $mapel)
    {
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'max:255',
        ]);
        $mapel->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'user_id' => $request->user_id,
        ]);
        return redirect()->back()->with('success', 'Berhasil Mengubah Mata Pelajaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mapel $mapel)
    {
        //
        $mapel->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data Mapel');
    }
}
