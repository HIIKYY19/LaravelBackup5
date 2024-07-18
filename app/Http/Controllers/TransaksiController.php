<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Tiket;
use App\Models\Rute;
use App\Models\Armada;
use App\Models\Jadwal;
use App\Models\Penumpang;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\DB;

use RealRashid\SweetAlert\Facades\Alert;
use PDF;
use Illuminate\Support\Facades\View;

use App\Exports\TransaksiExport; //export
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TransaksiImport; //imports
use Maatwebsite\Excel\HeadingRowImport;





class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function pesantiket(Request $request)
    {
        $request->validate([
            'total_tiket' => 'required|numeric|gt:0',
            'total_tiket' => 'required|numeric',
            'totalharga' => 'required|numeric',
        ],
        [
            'total_tiket.required' => 'total_tiket Harus diisi',
            'total_tiket.numeric' => 'total_tiket Harus Angka',
            'total_tiket.gt' => 'total_tiket Harus Angka Positif',
            'totalharga.required' => 'totalharga Harus diisi',
            'totalharga.numeric' => 'totalharga Harus Angka',
        ]);

         //tambah data eloquent
         DB::table('transaksi')->insert([
            'total_tiket'=>$request->total_tiket,
            'totalharga'=>$request->totalharga,
            'member_id'=>$request->member_id,
            'tiket_id'=>$request->tiket_id,
        ]);
         return redirect('/tiket')->with('success', 'Transaksi Anda Berhasil !');
    }

    public function index1($id)
    {
        //
        $transaksi = Transaksi::where('member_id', $id)->get();
        return view('utama.riwayat.index', compact('transaksi'));
    }

    public function show1($id)
    {
        $transaksi = Transaksi::join('member', 'transaksi.member_id', '=', 'member.id')
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
        ->where('transaksi.id_transaksi', $id)
        ->get();

    return view('utama.riwayat.lihat', compact('transaksi'));
    }

    public function DownloadaPDF($id){
        $transaksi = Transaksi::join('member', 'transaksi.member_id', '=', 'member.id')
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
        ->where('transaksi.id_transaksi', $id)
        ->get();

        $pdf = PDF::loadView('utama.riwayat.viewpdf', compact('transaksi'));
        $pdf->setPaper('a4', 'portrait');

        return $pdf->download('invoice.pdf');

    }


    public function index()
    {
        //
        $transaksi = Transaksi::all();
        return view('admin.transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $transaksi = DB::table('transaksi')->get();
        return view ('admin.transaksi.create', compact('transaksi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'total_tiket' => 'required|numeric',
            'totalharga' => 'required|numeric',
            'member_id' => 'required|numeric',
            'tiket_id' => 'required|numeric',
            'tanggal' => 'required|date',
        ],
        [
            'total_tiket.required' => 'total_tiket Harus diisi',
            'total_tiket.numeric' => 'total_tiket Harus Angka',
            'totalharga.required' => 'totalharga Harus diisi',
            'totalharga.numeric' => 'totalharga Harus Angka',
            'member_id.required' => 'member_id Harus diisi',
            'member_id.numeric' => 'member_id Harus Angka',
            'tiket_id.required' => 'tiket_id Harus diisi',
            'tiket_id.numeric' => 'tiket_id Harus Angka',
            'tanggal.required' => 'tanggal Harus diisi',
            'tanggal.date' => 'tanggal Harus tanggal',
        ]);

         //tambah data eloquent
         DB::table('transaksi')->insert([
            'total_tiket'=>$request->total_tiket,
            'totalharga'=>$request->totalharga,
            'member_id'=>$request->member_id,
            'tiket_id'=>$request->tiket_id,
            'tanggal'=>$request->tanggal,
        ]);
         return redirect('/admin/transaksi')->with('success', 'Transaksi Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $transaksi = Transaksi::where('id_transaksi', $id)->get();
        return view('admin.transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $transaksi = DB::table('transaksi')->where('id_transaksi',$id)->get();
        return view ('admin.transaksi.edit', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'total_tiket' => 'required|numeric',
            'totalharga' => 'required|numeric',
            'member_id' => 'required|numeric',
            'tiket_id' => 'required|numeric',
            'tanggal' => 'required|date',
        ],
        [
            'total_tiket.required' => 'total_tiket Harus diisi',
            'total_tiket.numeric' => 'total_tiket Harus Angka',
            'totalharga.required' => 'totalharga Harus diisi',
            'totalharga.numeric' => 'totalharga Harus Angka',
            'member_id.required' => 'member_id Harus diisi',
            'member_id.numeric' => 'member_id Harus Angka',
            'tiket_id.required' => 'tiket_id Harus diisi',
            'tiket_id.numeric' => 'tiket_id Harus Angka',
            'tanggal.required' => 'tanggal Harus diisi',
            'tanggal.date' => 'tanggal Harus tanggal',
        ]);
        //
        DB::table('transaksi')->where('id_transaksi',$request->id)->update([
            'total_tiket'=>$request->total_tiket,
            'totalharga'=>$request->totalharga,
            'member_id'=>$request->member_id,
            'tiket_id'=>$request->tiket_id,
            'tanggal'=>$request->tanggal,
        ]);
         return redirect('/admin/transaksi')->with('success', 'Transaksi Berhasil update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table('transaksi')->where('id_transaksi', $id)->delete();
        return redirect('admin/transaksi')->withSuccess('Berhasil Menghapus Data Transaksi!');
    }

    public function generatePDF(){
        $data = [
            'title' => 'Welcome to export PDF',
            'date' => ('m/d/y')
        ];
        $pdf = PDF::loadView('admin.transaksi.myPDF', $data);
        return $pdf->download('testdownload.pdf');
    }
    
    public function transaksiPDF(){
        $transaksi = Transaksi::all();
        $pdf = PDF::loadView('admin.transaksi.transaksiPDF', ['transaksi' => $transaksi])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function export() 
    {
        return Excel::download(new TransaksiExport, 'transaksi.xlsx');
    }

    public function import()
    {
        Excel::import(new TransaksiImport, request()->file('file'));
        
        return redirect('admin/transaksi')->with('success', 'All good!');
    }

}
