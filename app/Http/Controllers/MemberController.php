<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // Tambahkan use statement untuk Hash
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MemberExport;
use PDF;
use App\Imports\MemberImport;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menggunakan Eloquent untuk mendapatkan semua member
        $member = Member::all();
        return view('admin.member.index', compact('member'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menggunakan Eloquent untuk mendapatkan semua member
        $member = Member::all();
        return view('admin.member.create', compact('member'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'foto' => 'required'
        ]);
    //proses upload foto
    if(!empty($request->foto)){
        $fileName = 'foto-' . uniqid() . '.' . $request->foto->extension();
        $request->foto->move(public_path('admin/img'), $fileName);
    } else{
        $fileName = '';
    }
       //tambah data menggunakan query builder
       DB::table('member')->insert([
        'id'=>$request->id,
        'name'=>$request->nama,
        'email'=>$request->email,
        'password'=>$request->password,
        'role'=>$request->role,
        'foto'=>$fileName,
    ]);
    Alert::success('Member', 'Berhasil menambahkan Member');
    return redirect('admin/member')->with('success', 'member Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $member = Member::all()->where('id', $id);
        return view('admin.member.detail', compact('member'));

        
    }

    public function show1()
    {
        $member = Member::findOrFail(Auth::id());
        return view('admin.member.profile', compact('member'));
    }
    
    public function show2()
    {
        $member = Member::findOrFail(Auth::id());
        return view('utama.member.index', compact('member'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Menggunakan Eloquent untuk mendapatkan member berdasarkan nama
        $member = DB::table('member')->where('id',$id)->get();
        return view('admin.member.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update1(Request $request, $id)
{
    request()->validate([
        'name' => 'required|string|min:2|max:100',
        'email' => 'required|email|unique:users,email,' . $id . ',id',
        'old_password' => 'nullable',
        'password' => 'nullable|required_with:old_password|confirmed',
    ]);

    $member = Member::find($id);
    $member->name = $request->name;
    $member->email = $request->email;

    if ($request->filled('old_password')) {
        if (Hash::check($request->old_password, $member->password)) {
            $member->update([
                'password' => Hash::make($request->password),
            ]);
        } else {
            return back()
                ->withErrors(['old_password' => __('Tolong Periksa Password')])
                ->withInput();
        }
    }

    if ($request->hasFile('foto')) {
        if ($member->foto && file_exists(storage_path('app/public/fotos/' . $member->foto))) {
            Storage::delete('app/public/fotos/' . $member->foto);
        }
    
        $file = $request->file('foto');
        $fileName = time() . '_' . $file->getClientOriginalName();
    
        $file->move(storage_path('app/public/fotos/'), $fileName);
        $member->foto = $fileName;
    }

    $member->save();
    Alert::success('Berhasil', 'Profile Berhasil Di ubah');
    return back()->with('status', 'Profile Update!');
}


    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);


        //update foto
        $foto = DB::table('member')->select('foto')->where('id', $request->id)->get();
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
        // Update data menggunakan Eloquent
        Member::where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'foto' => $fileName,
        ]);
        Alert::success('Berhasil', 'Member Berhasil di rubah');
        return redirect('admin/member');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Menggunakan Eloquent untuk menghapus member berdasarkan nama
        Member::where('id', $id)->delete();
        Alert::warning('Member', 'Berhasil Menghapus Member');
        return redirect('admin/member');
    }
    public function generatePDF(){
        $data = [
            'title' => 'Welcome to export PDF',
            'date' => ('m/d/y')
        ];
        $pdf = PDF::loadView('admin.member.myPDF', $data);
        return $pdf->download('testdownload.pdf');
    }
    public function memberPDF(){
        $member = Member::all();
        $pdf = PDF::loadView('admin.member.memberPDF', ['member' => $member])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
    public function memberPDF_show (string $id){
        $member = Member::all();
        $pdf = PDF::loadView('admin.member.memberPDF_show', ['member'=>$member]);
        return $pdf->stream();
    }
    public function exportMember(){
        return Excel::download(new MemberExport, 'member.xlsx');
    }
    public function importMember(Request $request) 
    {
        Excel::import(new MemberImport, $request->file('file')->store('temp'));
      
        
        return redirect('admin/member')->with('success', 'DaTa Berhasil diimport!');
    }
}


