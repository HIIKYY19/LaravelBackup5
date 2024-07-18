<?php

namespace App\Imports;

use App\Models\Tiket;
use Maatwebsite\Excel\Concerns\ToModel;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TiketImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Tiket([
            'harga'     => $row['1'],
            'jadwal_id' => $row['2'],
            'rute_id'   => $row['3'],
            'armada_id'  => $row['4'],
        ]);
    }

    
}
