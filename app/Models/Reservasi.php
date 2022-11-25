<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;
    protected $fillable =[
        'nama_customer', 'no_telp', 'jumlah_orang','nama_kamar', 'tanggal_reservasi', 'tanggal_kepulangan', 'jumlah_hari'
    ];
}
