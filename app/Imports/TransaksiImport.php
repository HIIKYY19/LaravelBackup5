<?php

namespace App\Imports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TransaksiImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Transaksi([
            //
            'total_tiket' => $row['total_tiket'],
            'totalharga'    => $row['totalharga'],
            'penumpang_id'    => $row['penumpang_id'],
            'tiket_id'    => $row['tiket_id'],
            'tanggal'    => $row['tanggal'],
        ]);
    }
}
