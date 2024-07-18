<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $fillable = [
        'id_pembayaran', 'transaksi_id', 'tanggal', 'bayar', 'kembalian','status_pembayaran'
    ];
    public $timestamps =  false;
}
