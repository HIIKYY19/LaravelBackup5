<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Member extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'member';

    protected $fillable = [
        'name', 'email', 'password', 'role', 'foto',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Tambahkan properti $casts untuk konversi tipe data
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function armada (){
        return $this->hasMany(Armada::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'penumpang_id');
    }

}


