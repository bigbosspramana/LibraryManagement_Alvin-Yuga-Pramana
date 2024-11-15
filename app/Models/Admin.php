<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory;

    use Notifiable;

    // Jika Anda memiliki kolom tambahan seperti "remember_token", pastikan sudah ada di tabel
    protected $fillable = ['username', 'password', 'remember_token', 'role'];

    // Tambahkan atribut ini jika Anda ingin menggunakan `remember_token`
    public $timestamps = true;
}
