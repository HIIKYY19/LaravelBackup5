<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tiket;
use App\Models\Rute;
use App\Models\Armada;
use App\Models\Jadwal;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;
use App\Exports\TiketExport; //export
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TiketImport; //imports

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index1()
    {
        $tiket = Tiket::join('armada', 'armada_id', '=', 'armada.idarmada')
            ->join('rute', 'rute_id', '=', 'rute.idrute')
            ->select('tiket.*', 'armada.nama_armada as nama_armada', 'rute.kota_asal as kota_asal', 'rute.kota_tujuan as kota_tujuan')
            ->paginate(6);
        return view('utama.tiket.index', compact('tiket'));
    }

    public function pesantiket($id)
    {
        //
        $armada = DB::table('armada')->get();
        $rute = DB::table('rute')->get();
        $tiket = DB::table('tiket')->where('id_tiket',$id)->get();
        return view ('utama.tiket.pesantiket', compact('rute','armada','tiket'));
        
    }

        public function tampiltiket($id)
    {
        $tiket = Tiket::join('armada', 'armada_id', '=', 'armada.idarmada')
            ->join('rute', 'rute_id', '=', 'rute.idrute')
            ->join('jadwal', 'jadwal_id', '=', 'jadwal.idjadwal')
            ->select('tiket.*', 'armada.nama_armada as nama_armada', 'rute.kota_asal as kota_asal', 'rute.kota_tujuan as kota_tujuan', 'jadwal.jam_berangkat as berangkat', 'jadwal.jam_sampai as sampai')
            ->where('id_tiket', $id)
            ->get(); // Menggunakan first() karena mengambil satu baris hasil
            return view('utama.tiket.detail', compact('tiket'));
    }

    public function index()
    {
        $tiket = Tiket::join('armada', 'armada_id', '=', 'armada.idarmada')
            ->join('rute', 'rute_id', '=', 'rute.idrute')
            ->select('tiket.*', 'armada.nama_armada as nama_armada', 'rute.kota_asal as kota_asal', 'rute.kota_tujuan as kota_tujuan')
            ->get();
        return view('admin.tiket.index', compact('tiket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $armada = DB::table('armada')->get();
        $rute = DB::table('rute')->get();
        $jadwal = DB::table('jadwal')->get();
        return view ('admin.tiket.create', compact('rute','armada','jadwal'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'harga' => 'required|numeric',
            'jadwal_id' => 'required|numeric',
            'rute_id' => 'required|numeric',
            'armada_id' => 'required|numeric',
        ],
        [
            'harga.required' => 'Harga Harus diisi',
            'harga.numeric' => 'Harga Harus Angka',
            'jadwal_id.required' => 'Jadwal Harus diisi',
            'jadwal_id.numeric' => 'Jadwal Harus Angka',
            'rute_id.required' => 'Rute_id wajib diisi',
            'armada_id.required' => 'Armada_id Wajib Diisi',
        ]);
        //proses upload foto
        if(!empty($request->foto)){
            $fileName = 'foto-' . uniqid() . '.' . $request->foto->extension();
            $request->foto->move(public_path('admin/img'), $fileName);
        } else{
            $fileName = '';
        }

        DB::table('tiket')->insert([
            'harga'=>$request->harga,
            'jadwal_id'=>$request->jadwal_id,
            'rute_id'=>$request->rute_id,
            'armada_id'=>$request->armada_id,
            'foto'=>$fileName,
            'detail'=>$request->detail,
        ]);
         return redirect('/admin/tiket')->with('success', 'Tiket Berhasil Ditambahkan!');
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
        $tiket = Tiket::where('id_tiket', $id)->get();
        return view('admin.tiket.detail', compact('tiket'));
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
        $armada = DB::table('armada')->get();
        $rute = DB::table('rute')->get();
        $jadwal = DB::table('jadwal')->get();
        $tiket = DB::table('tiket')->where('id_tiket',$id)->get();
        return view ('admin.tiket.edit', compact('tiket','armada','rute','jadwal'));
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
        //
        $request->validate([
            'harga' => 'required|numeric',
            'jadwal_id' => 'required|numeric',
            'rute_id' => 'required|numeric',
            'armada_id' => 'required|numeric',
        ],
        [
            'harga.required' => 'Harga Harus diisi',
            'harga.numeric' => 'Harga Harus Angka',
            'jadwal_id.required' => 'Jadwal Harus diisi',
            'jadwal_id.numeric' => 'Jadwal Harus Angka',
            'rute_id.required' => 'Rute_id wajib diisi',
            'armada_id.required' => 'Armada_id Wajib Diisi',
        ]);

        //update foto
        $foto = DB::table('penumpang')->select('foto')->where('id', $request->id)->get();
        foreach($foto as $f){
            $namaFileFotoLama = $f->foto;
        }
        if(!empty($request->foto)){
            //jika ada foto lama maka hapus fotonya 
        if(!empty($namaFileFotoLama->foto)) unlink('admin/img'.$namaFileFotoLama->foto);
        //proses ganti foto
        $fileName = 'foto-'.$request->id . '.' . $request->foto->extension();
        $request->foto->move(public_path('/admin/img'), $fileName);
        } else {
            $fileName = '';
        }
        DB::table('tiket')->where('id_tiket',$request->id)->update([
            'harga'=>$request->harga,
            'jadwal_id'=>$request->jadwal_id,
            'rute_id'=>$request->rute_id,
            'armada_id'=>$request->armada_id,
            'foto'=>$fileName,
            'detail'=>$request->detail,
        ]);
         return redirect('/admin/tiket')->with('success', 'Tiket Berhasil Diedit!');
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
        DB::table('tiket')->where('id_tiket', $id)->delete();
        return redirect('admin/tiket')->withSuccess('Berhasil Menghapus Data Tiket!');
    }

    public function generatePDF(){
        $data = [
            'title' => 'Welcome to export PDF',
            'date' => ('m/d/y')
        ];
        $pdf = PDF::loadView('admin.tiket.myPDF', $data);
        return $pdf->download('testdownload.pdf');
    }
    
    public function tiketPDF(){
        $tiket = Tiket::join('armada', 'armada_id', '=', 'armada.idarmada')
        ->join('rute', 'rute_id', '=', 'rute.idrute')
        ->select('tiket.*', 'armada.nama_armada as nama_armada', 'rute.kota_asal as kota_asal', 'rute.kota_tujuan as kota_tujuan')
        ->get();
        $pdf = PDF::loadView('admin.tiket.tiketPDF', ['tiket' => $tiket])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

     public function export() 
    {
        return Excel::download(new TiketExport, 'tiket.xlsx');
    }

    public function importTiket() 
    {
        Excel::import(new TiketImport, request()->file('file'));
        
        return redirect('admin/tiket')->with('success', 'All good!');
    }
}
