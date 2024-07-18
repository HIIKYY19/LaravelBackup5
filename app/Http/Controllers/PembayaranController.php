<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Transaksi;
use App\Models\Tiket;
use App\Models\Rute;
use App\Models\Armada;
use App\Models\Jadwal;
use App\Models\Penumpang;
use Illuminate\Support\Facades\DB;

use PDF;

use RealRashid\SweetAlert\Facades\Alert;

class PembayaranController extends Controller
{
    //
    public function showDetail(Request $request)
    {
        // Validasi input form
        $request->validate([
            'transaksi_id' => 'required|numeric',
        ]);

        // Ambil data pembayaran berdasarkan transaksi_id
        $transaksi_id = $request->input('transaksi_id');
        $pembayaran = Transaksi::join('member', 'transaksi.member_id', '=', 'member.id')
        ->join('tiket', 'transaksi.tiket_id', '=', 'tiket.id_tiket')
        ->join('armada', 'armada_id', '=', 'armada.idarmada')
        ->join('rute', 'rute_id', '=', 'rute.idrute')
        ->join('jadwal', 'tiket.jadwal_id', '=', 'jadwal.idjadwal')
        ->join('pembayaran', 'pembayaran.transaksi_id', '=', 'transaksi.id_transaksi')
        ->select(
            'transaksi.*',
            'pembayaran.*',
            'member.name as nama_penumpang',
            'member.email as email',
            'tiket.id_tiket as id_tiket',
            'tiket.harga as harga',
            'tiket.jadwal_id as jadwal_id',
            'tiket.rute_id as rute_id',
            'tiket.armada_id as armada_id',
            'armada.jenis_armada as jenis_armada',
            'armada.nama_armada as nama_armada',
            'armada.kapasitas as kapasitas',
            'rute.kota_asal as kota_asal',
            'rute.kota_tujuan as kota_tujuan',
            'jadwal.jam_berangkat as jam_berangkat',
            'jadwal.jam_sampai as jam_sampai'
        )
        ->where('transaksi.id_transaksi', $transaksi_id)->get();

        if ($pembayaran) {
            // Jika pembayaran ditemukan, tampilkan detail
            return view('admin.pembayaran.detail', compact('pembayaran'));
        } else {
            // Jika pembayaran tidak ditemukan, beri pesan error
            return back()->with('error', 'Pembayaran dengan transaksi_id ' . $transaksi_id . ' tidak ditemukan.');

        }
    }

    public function bayar(Request $request)
    {
        //
        $request->validate([
            'bayar' => 'required|numeric',
            'status_pembayaran' => 'required|string',
        ]);
        $kembali =  $request->bayar - $request->total_harga;

        DB::table('pembayaran')->where('id_pembayaran',$request->id_pembayaran)->update([
            'bayar'=>$request->bayar,
            'kembalian'=>$kembali,
            'status_pembayaran'=>$request->status_pembayaran,
        ]);
         return redirect('/admin/pembayaran')->with('success', 'Pembayaran Berhasil update!');
    }

    public function index1()
    {
        //
        $pembayaran = Pembayaran::all();
        return view('admin.pembayaran.pembayaran', compact('pembayaran'));
    }

    public function index()
    {
        //
        $pembayaran = Pembayaran::all();
        return view('admin.pembayaran.index', compact('pembayaran'));
    }

    public function pembayaranPDF(){
        $pembayaran = Pembayaran::all();
        $pdf = PDF::loadView('admin.pembayaran.pembayaranPDF', ['pembayaran' => $pembayaran])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

}
