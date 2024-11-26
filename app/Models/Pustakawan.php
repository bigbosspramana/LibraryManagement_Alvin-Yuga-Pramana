<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class Pustakawan extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasApiTokens;

    protected $fillable = [
        'username',
        'password',
        'remember_token',
        'role',
        'type',
    ];

    public $timestamps = true;

    // Mutator untuk meng-hash password sebelum disimpan
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function scopeDosen($query)
    {
        return $query->where('type', 'dosen');
    }

    public function scopeMahasiswa($query)
    {
        return $query->where('type', 'mahasiswa');
    }
}

