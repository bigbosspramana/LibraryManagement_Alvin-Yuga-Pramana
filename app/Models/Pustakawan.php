<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Pustakawan extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    use HasApiTokens;

    protected $table = 'pustakawans'; 
    protected $fillable = [
        'username',
        'password',
        'role',
        'type',
    ];

    public $timestamps = true;

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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

