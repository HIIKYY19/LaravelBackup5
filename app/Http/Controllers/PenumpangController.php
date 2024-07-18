<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penumpang;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Exports\PenumpangExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Imports\PenumpangImport;

class PenumpangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $penumpang = Penumpang::all();
        return view('admin.penumpang.index', compact('penumpang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $penumpang = Penumpang::all();
        $gender = ['Laki-laki', 'Perempuan'];
        return view('admin.penumpang.create', compact('penumpang', 'gender'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required|max:45',
            'gender'=>'required',
            'no_telepon'=>'required|numeric',
            'berat_bawaan'=>'required',
            'password'=>'required',

        ],
        [
            'nama.required'=>'Nama wajib diisi',
            'nama.max' => 'Nama maximal 45 karakter',
            'gender.required'=>'Gender wajib diisi',
            'no_telepon.numeric'=>'Harus angka',
            'no_telepon.required'=>'No.Telepon harus diisi',
            'berat_bawaan.required'=>'Harus diisi',
            // 'password.reqired'=>'Harus angka',
            'password.required'=>'Password harus diisi',
        ]
        );
        //proses upload foto
        if(!empty($request->foto)){
            $fileName = 'foto-' . uniqid() . '.' . $request->foto->extension();
            $request->foto->move(public_path('admin/img'), $fileName);
        } else{
            $fileName = '';
        }
        //
        //tambah data menggunakan query builder
        DB::table('penumpang')->insert([
            'nama'=>$request->nama,
            'gender'=>$request->gender,
            'no_telepon'=>$request->no_telepon,
            'berat_bawaan'=>$request->berat_bawaan,
            'password'=>$request->password,
            'foto'=>$fileName,
        ]);
        // Alert::success('Penumpang', 'Berhasil menambahkan penumpang');
        return redirect('/admin/penumpang')->withSuccess('Berhasil menambahkan data penumpang');; 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $penumpang = Penumpang::all()->where('id', $id);
        return view('admin.penumpang.detail', compact('penumpang'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $penumpang = DB::table('penumpang')->where('id',$id)->get();
        return view ('admin.penumpang.edit', compact('penumpang')); 

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama'=>'required|max:45',
            'gender'=>'required',
            'no_telepon'=>'required|numeric',
            'berat_bawaan'=>'required',
            'password'=>'required',
            // 'foto'=>'nullable|image|mimes:jpg,jpeg,gif,png,svg|max:2048',

        ],
        [
            'nama.required'=>'Nama wajib diisi',
            'nama.max' => 'Nama maximal 45 karakter',
            'gender.required'=>'Gender wajib diisi',
            'no_telepon.numeric'=>'Harus angka',
            'no_telepon.required'=>'No.Telepon harus diisi',
            'berat_bawaan.required'=>'Harus diisi',
            'password.required'=>'Passsword Harus diisi',
            // 'foto.max' => 'Maksimal 2 MB',
            // 'foto.image' => 'File ekstensi harus jpg,jpeg,png,gif,svg',
        ]
        );
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
         DB::table('penumpang')->where('id',$request->id)->update([
            'nama'=>$request->nama,
            'gender'=>$request->gender,
            'no_telepon'=>$request->no_telepon,
            'berat_bawaan'=>$request->berat_bawaan,
            'password'=>$request->password,
            'foto'=>$fileName,
        ]);
    
        // Alert::success('Penumpang', 'Berhasil mengupdate penumpang');
        return redirect('/admin/penumpang')->withSuccess('Penumpang berhasil diupdate');; 
// }catch(\exception $e){

        // Alert::success('Penumpang', 'Berhasil mengupdate penumpang');
        return back()->with('errors', $validator->messages()->all()[0])->withInput();
// }
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('penumpang')->where('id', $id)->delete();
        // Alert::error('Penumpang', 'Berhasil menghapus penumpang');
        return redirect('admin/penumpang')->withError('Berhasil menghapus data penumpang');;
    }
    public function penumpangPDF(){
        $penumpang = Penumpang::all();
        $pdf = PDF::loadView('admin.penumpang.penumpangPDF', ['penumpang'=>$penumpang])->setPaper('a4', 'landscape');
        return $pdf->stream();   
    }
    public function penumpangPDF_show (string $id){
        $penumpang = Penumpang::all();
        $pdf = PDF::loadView('admin.penumpang.penumpangPDF_show', ['penumpang'=>$penumpang]);
        return $pdf->stream();
    }
    public function exportPenumpang(){
        return Excel::download(new PenumpangExport, 'penumpang.xlsx');
    }
    public function importPenumpang(Request $request) 
    {
        Excel::import(new PenumpangImport, $request->file('file')->store('temp'));
      
        
        return redirect('admin/penumpang')->with('success', 'Produk Berhasil diimport!');
    }
}