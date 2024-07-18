<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use App\Models\Tiket;
use App\Models\Rute;
use App\Models\Armada;
use App\Models\Jadwal;
use App\Models\Penumpang;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //fungsi index
    public function index(){

        $transaksi = Transaksi::count();
        $tiket = Tiket::count();
        $armada = Armada::count();
        $penumpang = Penumpang::count();
        $jenis_tiket = DB::table('transaksi')
        ->select('tiket_id', DB::raw('count(tiket_id) as jumlah'))
        ->groupBy('tiket_id')
        ->get();

        $hitung_harga = DB::table('transaksi')
        ->join('member', 'transaksi.member_id', '=', 'member.id')
        ->select('member.name', DB::raw('SUM(transaksi.totalharga) as total_harga'))
        ->groupBy('member.name')
        ->get();
    

        return view('admin.dashboard', 
        compact('transaksi', 'tiket','armada','jenis_tiket', 'hitung_harga'));
    }

}
