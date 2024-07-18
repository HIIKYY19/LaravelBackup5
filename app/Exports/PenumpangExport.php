<?php

namespace App\Exports;

use App\Models\Penumpang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PenumpangExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Penumpang::all();
    }
    public function headings():array{
        return["Id","Nama","Gender","No.  Telepon","Berat bawaan","Password"];
    }
}
