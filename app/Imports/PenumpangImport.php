<?php

namespace App\Imports;

use App\Models\Penumpang;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class PenumpangImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Penumpang([
            //
                'nama'     => $row[0],
                'gender'    => $row[1], 
                'no_telepon'    => $row[2], 
                'berat_bawaan'    => $row[3], 
                'password' => Hash::make($row[4]),
             ]);
    }
}
