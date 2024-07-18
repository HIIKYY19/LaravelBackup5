<?php

namespace App\Exports;

use App\Models\Armada;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ArmadaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Armada::all();
        $armada = Armada::join('member', 'member_id', '=', 'member.id')
        ->select('armada.idarmada', 'armada.jenis_armada', 'armada.nama_armada',
        'armada.kapasitas', 'member.nama as supir')
        ->get();
        return $armada;
    }

    public function headings() : array{
        return ["ID Armada", "Jenis Armada", "Nama Armada", "Kapasitas", "Nama Supir"];
    }
}
