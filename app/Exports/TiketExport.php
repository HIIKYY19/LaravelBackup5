<?php

namespace App\Exports;

use App\Models\Tiket;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TiketExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $tiket = Tiket::join('armada', 'armada_id', '=', 'armada.idarmada')
            ->join('rute', 'rute_id', '=', 'rute.idrute')
            ->select('tiket.id_tiket','tiket.harga','tiket.jadwal_id', 'rute.kota_asal as kota_asal', 'rute.kota_tujuan as kota_tujuan','armada.nama_armada as nama_armada' )
            ->get();
        return $tiket;
    }

    public function headings(): array
    {
        return [
            'id_tiket',
            'harga',
            'jadwal_id',
            'kota_asal',    
            'kota_tujuan',  
            'nama_armada',
        ];
    }
}
