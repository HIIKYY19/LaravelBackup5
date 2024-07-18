<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal';
    protected $fillable = [
        'jam_sampai', 'jam_berangkat'
    ];
    public $timestamps =  false;

    public function tiket (){
        return $this->hasMany(Tiket::class);
    }
}
