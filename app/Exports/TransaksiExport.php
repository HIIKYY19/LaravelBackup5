<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransaksiExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transaksi::all();
    }

    public function headings(): array
    {
        return [
            'no',
            'total_tiket',
            'totalharga',
            'penumpang_id',    
            'tiket_id',  
            'tanggal',
        ];
    }
}
