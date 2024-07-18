<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// menghubungkan model ke controller
use App\Models\Armada;
use App\Models\Member;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\ArmadaExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ArmadaImport;
use PDF;


class ArmadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // sintaks menggunakan eloquent
        $armada = DB::table('armada')->get();

        $armada = Armada::leftJoin('member', 'member_id', '=', 'member.id')
        ->select('armada.*', 'member.name as nama')
        ->get();
        // $armada = Armada::join('member', 'member_id', '=', 'member.id')
        // ->select('armada.*', 'member.name as nama', )
        // ->get();
        // $armada = Armada::all();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('admin.armada.index', compact('armada'));
        // return view('admin.armada.index', ['armada' => $armada]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $armada = Armada::all();
        $member = DB::table('member')->get();
        // return view('admin.armada.create', compact('armada'));
        return view('admin.armada.create', compact('member'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_armada' => 'required |max:45',
            'nama_armada' => 'required |max:45',
            'kapasitas' => 'required |max:45',
            'member_id' => 'required|integer',
        ],
        [
            'jenis_armada.required' => 'Jenis Armada wajib diisi',
            'nama_armada.required' => 'Nama Armada wajib diisi',
            'kapasitas.required' => 'Kapasitas Armada wajib diisi',
            'member_id.required' => 'Nama Supir wajib diisi',

        ]
    );
        //
        // $armada = new Armada;
        DB::table('armada')->insert([
            'jenis_armada' => $request->jenis_armada,
            'nama_armada' => $request->nama_armada,
            'kapasitas' => $request->kapasitas,
            'member_id' => $request->member_id,
        ]);
        // $armada->kode_armada = $request->kode_armada;
        // $armada->member_id = $request->member_id;
        // $armada->save();
        return redirect('/admin/armada')->withSuccess('Berhasil Menambahkan Data Armada');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        //
        // $armada = DB::table('armada')->where('idarmada',$id)->get();
        // $armada = Armada::join()
        $armada = Armada::join('member', 'member_id', '=', 'member.id')
        ->select('Armada.*', 'member.nama as supir')
        ->where('armada.idarmada', $id  )
        ->get();
        return view ('admin.armada.detail', compact('armada'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        //
        $member = DB::table('member')->get();
        $armada = DB::table('armada')->where('idarmada',$id)->get();
        return view ('admin.armada.edit', compact('armada', 'member'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_armada' => 'required |max:45',
            'nama_armada' => 'required |max:45',
            'kapasitas' => 'required |max:45',
            'member_id' => 'required|integer',
        ],
        [
            'jenis_armada.required' => 'Jenis Armada wajib diisi',
            'nama_armada.required' => 'Nama Armada wajib diisi',
            'kapasitas.required' => 'Kapasitas Armada wajib diisi',

        ]
    );
        //
        DB::table('armada')->where('idarmada',$request->id)->update([
            // 'kode_armada'=>$request->kode_armada,
            'jenis_armada'=> $request->jenis_armada,
            'nama_armada'=> $request->nama_armada,
            'kapasitas'=> $request->kapasitas,
            'member_id' => $request->member_id,

        ]);
        return redirect('/admin/armada')->with('success', 'Data Armada Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        //
        DB::table('armada')->where('idarmada', $id)->delete();
        return redirect ('admin/armada')->with('success', 'Data Armada Berhasil Dihapus!');
    }

    public function armadaAllPDF(){
        $armada = Armada::join('member', 'member_id', '=', 'member.id')
        ->select('Armada.*', 'member.nama as supir')
        ->get();

        $pdf = PDF::loadView('admin.armada.armadaAllPDF', ['armada' => $armada])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function idPDF(string $id){
        $armada = Armada::join('member', 'member_id', '=', 'member.id')
        ->select('Armada.*', 'member.nama as supir')
        ->where('armada.idarmada', $id)
        ->get();
        
        $pdf = PDF::loadView('admin.armada.idPDF', ['armada' => $armada]);
        return $pdf->stream();
    }

    public function exportArmada(){
        return Excel::download(new ArmadaExport, 'armada.xlsx');
    }

    public function importArmada(Request $request) 
    {
        Excel::import(new ArmadaImport, $request->file('file')->store('temp'));
        
        return redirect('admin/armada')->with('success', 'Data Berhasil Ditambahkan');
    }
}
