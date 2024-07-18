<?php

namespace App\Exports;

use App\Models\Jadwal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class JadwalExport implements FromCollection, withHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Jadwal::all();
    }

    public function headings() : array {
        return["ID Jadwal", "Jam Berangkat", "Jam Sampai"];
    }
}
