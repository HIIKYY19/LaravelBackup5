<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Armada extends Model
{
    use HasFactory;
    protected $table = 'armada';
    protected $fillable = [
        // 'kode_armada', 'jenis_armada', 'nama_armada', 'kapasitas'
        'jenis_armada','nama_armada', 'kapasitas', 'member_id'
    ];
    public $timestamps = false;

    public function tiket (){
        return $this->hasMany(Tiket::class);
    }
    public function member (){
        return $this->hasMany(Member::class);
    }
}
