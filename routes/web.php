<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\ArmadaController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PenumpangController;
use App\Http\Controllers\RuteController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PembayaranController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('utama.dashboard');
});

//untuk bagian halaman utama
Route::group(['middleware' => ['auth']], function(){
Route::prefix('tiket')->group(function(){
Route::get('/', [TiketController::class, 'index1']);
Route::get('/detailtiket/{id}', [TiketController::class, 'tampiltiket']);
Route::get('/pesantiket/{id}', [TiketController::class, 'pesantiket']);
Route::post('/store', [TransaksiController::class, 'pesantiket']);
});
Route::get('/riwayat/{id}', [TransaksiController::class, 'index1']);
Route::get('/riwayat/lihat/{id}', [TransaksiController::class, 'show1']);
Route::get('/riwayat/download/{id}', [TransaksiController::class, 'DownloadaPDF']);

Route::get('/profile', [MemberController::class, 'show2']);
Route::patch('/profile/{id}', [MemberController::class, 'update1']);

});

//untuk bagian halaman admin
Route::group(['middleware' => ['auth', 'peran:admin-manager-staff-supir']], function(){
Route::prefix('admin')->group(function(){
Route::get('/dashboard', [DashboardController::class, 'index']);

Route::group(['middleware' => ['auth', 'peran:admin-manager']], function(){


route::get('/pembayaran/index', [PembayaranController::class, 'index']);
Route::get('/pembayaran/pembayaranPDF', [PembayaranController::class, 'pembayaranPDF']);

Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::get('/transaksi/create', [TransaksiController::class, 'create']);
Route::post('/transaksi/store', [TransaksiController::class, 'store']);
Route::get('/transaksi/show/{id}', [TransaksiController::class, 'show']);
Route::get('/transaksi/edit/{id}', [TransaksiController::class, 'edit']);
Route::post('/transaksi/update/{id}', [TransaksiController::class, 'update']);
Route::get('/transaksi/destroy/{id}', [TransaksiController::class, 'destroy']);
Route::get('/transaksi/transaksiPDF', [TransaksiController::class, 'transaksiPDF']);
Route::get('/transaksi/export', [TransaksiController::class, 'export']);
Route::post('/transaksi/import', [TransaksiController::class, 'import']);

Route::get('/member', [MemberController::class, 'index']);

Route::get('/member/create', [MemberController::class, 'create']);
Route::post('/member/store', [MemberController::class, 'store']);
route::get('/member/show/{id}', [MemberController::class, 'show']);
Route::get('/member/edit/{id}', [MemberController::class, 'edit']);
Route::post('/member/update/{id}', [MemberController::class, 'update']);
route::get('/member/delete/{id}', [MemberController::class, 'destroy']);
Route::get('/generatePDF', [MemberController::class, 'generatePDF']);
Route::get('/member/memberPDF', [MemberController::class, 'memberPDF']);
Route::get('/member/pdfshow/{id}', [MemberController::class, 'memberPDF_show']);
Route::get('/member/export/', [MemberController::class, 'exportMember']);
Route::post('/member/import/', [MemberController::class, 'importMember']);

route::get('/penumpang', [PenumpangController::class, 'index']);
route::get('/penumpang/create', [PenumpangController::class, 'create']);
route::post('/penumpang/store', [PenumpangController::class, 'store']);
route::get('/penumpang/show/{id}', [PenumpangController::class, 'show']);
route::get('/penumpang/edit/{id}', [PenumpangController::class, 'edit']);
route::post('/penumpang/update/{id}', [PenumpangController::class, 'update']);
route::get('/penumpang/delete/{id}', [PenumpangController::class, 'destroy']);
Route::get('/generatePDF', [PenumpangController::class, 'generatePDF']);
Route::get('/penumpang/penumpangPDF', [PenumpangController::class, 'penumpangPDF']);
Route::get('/penumpang/pdfshow/{id}', [PenumpangController::class, 'penumpangPDF_show']);
Route::get('/penumpang/export/', [PenumpangController::class, 'exportPenumpang']);
Route::post('/penumpang/import/', [PenumpangController::class, 'importPenumpang']);

Route::get('/tiket/destroy/{id}', [TiketController::class, 'destroy']);
Route::get('/armada/delete/{id}', [ArmadaController::class, 'destroy']);
Route::get('/rute/delete/{id}', [RuteController::class, 'destroy']);
Route::get('/jadwal/delete/{id}', [JadwalController::class, 'destroy']);
});
//untuk bagian halaman staff

Route::get('/member/profile', [MemberController::class, 'show1']);
Route::patch('/member/profile/{id}', [MemberController::class, 'update1']);

route::get('/pembayaran', [PembayaranController::class, 'index1']);
route::get('/pembayaran/detail', [PembayaranController::class, 'showDetail']);
route::post('/pembayaran/bayar', [PembayaranController::class, 'bayar']);

Route::get('/tiket', [TiketController::class, 'index']);
Route::get('/tiket/create', [TiketController::class, 'create']);
Route::post('/tiket/store', [TiketController::class, 'store']);
Route::get('/tiket/show/{id}', [TiketController::class, 'show']);
Route::get('/tiket/edit/{id}', [TiketController::class, 'edit']);
Route::post('/tiket/update/{id}', [TiketController::class, 'update']);

Route::get('/tiket/tiketPDF', [TiketController::class, 'tiketPDF']);
Route::get('/tiket/export', [TiketController::class, 'export']);
Route::post('/tiket/import', [TiketController::class, 'importTiket']);

Route::get('/armada', [ArmadaController::class, 'index']);
Route::get('/armada/create', [ArmadaController::class, 'create']);
Route::post('/armada/store', [ArmadaController::class, 'store']);
Route::get('/armada/show/{id}', [ArmadaController::class, 'show']);
Route::get('/armada/edit/{id}', [ArmadaController::class, 'edit']);
Route::post('/armada/update/{id}', [ArmadaController::class, 'update']);

Route::get('/armada/armadaAllPDF', [ArmadaController::class, 'armadaAllPDF']);
Route::get('/armada/idPDF/{id}', [ArmadaController::class, 'idPDF']);
Route::get('/armada/export/', [ArmadaController::class, 'exportArmada']);
Route::post('/armada/import/', [ArmadaController::class, 'importArmada']);

Route::get('/rute', [RuteController::class, 'index']);
Route::get('/rute/create', [RuteController::class, 'create']);
Route::post('/rute/store', [RuteController::class, 'store']);
Route::get('/rute/show/{id}', [RuteController::class, 'show']);
Route::get('/rute/edit/{id}', [RuteController::class, 'edit']);
Route::post('/rute/update/{id}', [RuteController::class, 'update']);


route::get('/jadwal', [JadwalController::class, 'index']);
route::get('/jadwal/create', [JadwalController::class, 'create']);
route::post('/jadwal/store', [JadwalController::class, 'store']);
Route::get('/jadwal/show/{id}', [JadwalController::class, 'show']);
Route::get('/jadwal/edit/{id}', [JadwalController::class, 'edit']);
Route::post('/jadwal/update/{id}', [JadwalController::class, 'update']);

Route::get('/jadwal/jadwalAllPDF', [JadwalController::class, 'jadwalAllPDF']);
Route::get('/jadwal/jadwalIdPDF/{id}', [JadwalController::class, 'jadwalIdPDF']);
Route::get('/jadwal/export/', [JadwalController::class, 'exportJadwal']);
// Route::post('/jadwal/import/', [JadwalController::class, 'importJadwal']);
});
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
