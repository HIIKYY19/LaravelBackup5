<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
          */
    public function index()
    {
        //
        $jadwal = Jadwal::all();
        return view ('admin.jadwal.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
        $jadwal = Jadwal::All();
        return view('admin.jadwal.create', compact('jadwal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'jam_berangkat' => 'required|time',
            'jam_berangkat' => 'required',
            // 'jam_sampai' => 'required|time',
            'jam_sampai' => 'required',
        ],
        [
            'jam_berangkat.required' => 'jam berangkat wajib diisi',
            'jam_sampai.required' => 'jam sampai wajib diisi',
        ]);
        //
        $jadwal = new Jadwal;
        $jadwal->jam_berangkat = $request->jam_berangkat;
        $jadwal->jam_sampai = $request->jam_sampai;
        $jadwal->save();
        return redirect('/admin/jadwal')->withSuccess('Berhasil Menambahkan data Jadwal');
        // return redirect('/admin/jadwal');

    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        //
        $jadwal = DB::table('jadwal')->where('idjadwal',$id)->get();
        return view('admin.jadwal.detail', compact('jadwal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        //
        $jadwal = DB::table('jadwal')->where('idjadwal', $id)->get();
        return view ('admin.jadwal.edit', compact('jadwal'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            // 'jam_berangkat'=>'required|time',
            'jam_berangkat'=>'required',
            // 'jam_sampai'=>'required|time',
            'jam_sampai'=>'required',
        ],
        [
            'jam_berangkat.required' => 'jam berangkat wajib diisi',
            'jam_sampai.required' => 'jam sampai wajib diisi',
        ]
    );
        
        DB::table('jadwal')->where('idjadwal', $request->id)->update([
            'jam_berangkat'=>$request->jam_berangkat,
            'jam_sampai'=>$request->jam_sampai,
        ]);
        return redirect('/admin/jadwal')->withSuccess('Berhasil Update data Jadwal');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        //
        DB::table('jadwal')->where('idjadwal', $id)->delete();
        return redirect ('admin/jadwal')->withSuccess('Berhasil Menghapus Data Jadwal');
    }
}
