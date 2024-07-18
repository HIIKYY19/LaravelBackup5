<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    use HasFactory;

    // mapping table
    protected $table = 'rute';

    // mapping kolom atau field
    protected $fillable = ['kode', 'kota_asal', 'kota_tujuan', 'jarak'];

    public $timestamps = false;

    // relasi antara table 
    public function rute(){
        return $this->hasmany(Rute::class);
    }

    public function tiket (){
        return $this->hasMany(Tiket::class);
    }
}
