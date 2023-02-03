<?php

namespace App\Imports;

use App\Models\Soal;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SoalImport implements ToModel, WithHeadingRow
{
    private $mapel_id;

    public function __construct(int $mapel_id)
    {
        $this->mapel_id = $mapel_id;
    }

    public function model(array $row)
    {
        return new Soal([
            'mapel_id' => $this->mapel_id,
            'soal' => $row['soal'],
            'opsi_a' => $row['opsi_a'],
            'opsi_b' => $row['opsi_b'],
            'opsi_c' => $row['opsi_c'],
            'opsi_d' => $row['opsi_d'],
            'opsi_e' => $row['opsi_e'],
            'key' => $row['kunci'],
        ]);
    }
}
