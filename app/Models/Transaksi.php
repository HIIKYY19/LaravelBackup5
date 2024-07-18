<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    public $timestamps = false;
    use HasFactory;
    
    //mapping ke tabel
    protected $table = 'transaksi';
    //mapping ke kolom/fieldnya
    protected $fillable = ['id_transaksi', 'total_tiket', 'totalharga', 'penumpang_id','member_id', 'tiket_id','tanggal'];

    
    public function tiket(){
        return $this->belongsTo(Tiket::class, 'tiket_id');
   }
   
   public function penumpang(){
        return $this->belongsTo(Penumpang::class, 'penumpang_id');
   }
   
   public function member(){
     return $this->belongsTo(Member::class, 'member_id');
}
}
