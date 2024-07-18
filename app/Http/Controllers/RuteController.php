<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rute;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class RuteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rute = Rute::all();
        return view('admin.rute.index', compact('rute'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rute = Rute::all();
        return view('admin.rute.create', compact('rute'));
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
            'kode' => 'required|unique:rute|max:10',
            'kota_asal' => 'required|max:45',
            'kota_tujuan' => 'required|max:45',
            'jarak' => 'required|numeric',
        ],
        [
            'kode.max' => 'Kode maximal 10 karakter',
            'kode.required' => 'Kode Wajib diisi',
            'kode.unique' => 'Kode Sudah terisi pada data lain',
            'kota_asal.required' => 'Nama wajib diisi',
            'kota_asal.max' => 'Nama maksimal 45 karakter',
            'kota_tujuan.required' => 'Nama wajib diisi',
            'kota_tujuan.max' => 'Nama maksimal 45 karakter',
            'jarak.required' => 'Jarak harus diisi',
            'jarak.numeric' => 'Harus diisi Angka',
        ]);

        $rute = new Rute;
        $rute->kode = $request->kode;
        $rute->kota_asal = $request->kota_asal;
        $rute->kota_tujuan = $request->kota_tujuan;
        $rute->jarak = $request->jarak;
        $rute->save();

        Alert::success('Rute', ' Data Rute berhasil Ditambahkan');

        return redirect('/admin/rute'); 

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rute = Rute::all()->where('idrute', $id);
        return view('admin.rute.detail', compact('rute'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $rute = Rute::all()->where('idrute', $id);
        return view('admin.rute.edit', compact('rute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kota_asal' => 'required|max:45',
            'kota_tujuan' => 'required|max:45',
            'jarak' => 'required|numeric',
        ],
        [
            'kota_asal.required' => 'Kota Asal wajib diisi',
            'kota_asal.max' => 'Kota Asal maksimal 45 karakter',
            'kota_tujuan.required' => 'Kota Tujuan wajib diisi',
            'kota_tujuan.max' => 'Kota Tujuan maksimal 45 karakter',
            'jarak.required' => 'Jarak harus diisi',
            'jarak.numeric' => 'Jarak harus diisi Angka',
        ]
    );

        // Data Equelomet
        // $rute = Rute::find($request->idrute);
        // $rute->kode = $request->kode;
        // $rute->kota_asal = $request->kota_asal;s
        // $rute->kota_tujuan = $request->kota_tujuan;
        // $rute->jarak = $request->jarak;
        // $rute->save();
        // return redirect('/admin/rute'); 

        // Data Buider
        DB::table('rute')->where('idrute',$request->id)->update([
            'kode'=>$request->kode,
            'kota_asal'=>$request->kota_asal,
            'kota_tujuan'=>$request->kota_tujuan,
            'jarak'=>$request->jarak,
        ]);
        return redirect('/admin/rute')->with('success', 'Data Rute berhasil diupdate!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        //
        // $rute = Rute::where('idrute',$id)->delete();
        // return redirect('admin/rute');

        DB::table('rute')->where('idrute', $id)->delete();
        return redirect ('admin/rute')->with('success', 'Data Rute berhasil Dihapus');
    }
}
