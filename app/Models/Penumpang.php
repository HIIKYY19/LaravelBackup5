<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Penumpang extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'penumpang';
    protected $fillable = [
        'nama', 'gender', 'no_telepon', 'berat_bawaan', 'password', 'foto'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Tambahkan properti $casts untuk konversi tipe data
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Nama fungsi relasinya sebaiknya disesuaikan dengan konvensi Laravel
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'penumpang_id');
    }
}
