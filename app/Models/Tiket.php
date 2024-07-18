<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    public $timestamps = false;
    use HasFactory;

    //mapping ke tabel
    protected $table = 'tiket';
    //mapping ke kolom/fieldnya
    protected $fillable = ['id_tiket', 'harga', 'jadwal_id', 'jenis_tiket_id', 'rute_id', 'armada_id'];

    public function armada(){
        return $this->belongsTo(Armada::class, 'armada_id');
    }

    public function rute(){
        return $this->belongsTo(Rute::class, 'rute_id');
    }

    public function jadwal(){
        return $this->belongsTo(Jadwal::class, 'jadwal_id');
    }

    public function transaksi(){
        return $this->hasMany(Transaksi::class, 'tiket_id');
    }
}
