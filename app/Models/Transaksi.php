<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis';
    protected $fillable = [
        'buku_id',
        'tgl_pinjam',
        'tgl_kembali',
        'anggota_id',
        'status'
    ];

    public function buku()
    {
        return $this->belongsTo(Books::class);
    }
}
