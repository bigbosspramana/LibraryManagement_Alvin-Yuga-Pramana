<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    // Tentukan kolom yang bisa diisi (fillable)
    protected $fillable = [
        'judul',
        'type',
        'deskripsi',
        'halaman',
        'penulis',
        'artis',
        'genre',
        'tahun_terbit',
    ];

    // Jika Anda ingin melakukan query berdasarkan type, Anda bisa membuat metode tambahan di model ini
    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }
}
