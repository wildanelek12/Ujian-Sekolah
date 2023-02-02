<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function createGuru(Request $request){
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
    public function updateGuru(Request $request,$id){
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'nip' => [
                'required',
                 Rule::unique('users', 'induk')->ignore($id),
            ]
        ]);

        User::where('id',$id)->update([
                'nama' => $request->nama,
                'induk' => $request->nip,
                'role'  => 2,
                'password' => bcrypt('guru1234')
        ]);
        return redirect()->back()->with('success', 'Berhasil Mengupdate Data Guru');
    }
    public function deleteGuru($id){
        User::where('id',$id)->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data Guru');
    }
}
