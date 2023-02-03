<?php

namespace App\Imports;

use App\Models\Kelas;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    function getKelas($nama)
    {
        return Kelas::where('nama', $nama)->first()->id;
    }
    public function model(array $row)
    {



        return new User([
            'nama' => $row['nama'],
            'induk' => $row['nis'],
            'kelas_id' => $this->getKelas($row['kelas']),
            'role' => 3,
            'password'  => bcrypt($row['nis']),
        ]);
    }
}
