<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'peminjam',
        'pic_name',
        'pic_phone',
        'nama_kegiatan',
        'deskripsi',
        'tanggal',
        'tanggal_selesai',
        'jam_mulai',
        'jam_selesai',
        'status',
        'surat',
    ];
}
