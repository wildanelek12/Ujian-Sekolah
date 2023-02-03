<?php

namespace App\Http\Controllers;

use App\Imports\SiswaImport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function createGuru(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'nip' => 'required|unique:users,induk',
        ]);
        User::create([
            'nama' => $request->nama,
            'induk' => $request->nip,
            'role'  => 2,
            'password' => bcrypt('guru1234')
        ]);
        return redirect()->back()->with('success', 'Berhasil Menambahkan Guru');
    }
    public function updateGuru(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'nip' => [
                'required',
                Rule::unique('users', 'induk')->ignore($id),
            ]
        ]);

        User::where('id', $id)->update([
            'nama' => $request->nama,
            'induk' => $request->nip,
            'role'  => 2,
        ]);
        return redirect()->back()->with('success', 'Berhasil Mengupdate Data Guru');
    }
    public function deleteGuru($id)
    {
        User::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data Guru');
    }

    public function createSiswa(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'nis' => 'required|unique:users,induk',
        ]);
        User::create([
            'nama' => $request->nama,
            'induk' => $request->nis,
            'role'  => 3,
            'kelas_id' => $request->kelas,
            'password' => bcrypt($request->nis)
        ]);
        return redirect()->back()->with('success', 'Berhasil Menambahkan Siswa');
    }

    public function createSiswaFromExcel(Request $request)
    {
        $validated = $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('file_siswa', $nama_file);

        // import data
        Excel::import(new SiswaImport, public_path('/file_siswa/' . $nama_file));

        return redirect()->back()->with('success', 'Berhasil Menambahkan Siswa');
    }
    public function updateSiswa(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'nis' => [
                'required',
                Rule::unique('users', 'induk')->ignore($id),
            ]
        ]);

        User::where('id', $id)->update([
            'nama' => $request->nama,
            'induk' => $request->nis,
            'role'  => 3,
            'kelas_id' => $request->kelas,
        ]);
        return redirect()->back()->with('success', 'Berhasil Mengupdate Data Siswa');
    }
    public function deleteSiswa($id)
    {
        User::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data Siswa');
    }
}
