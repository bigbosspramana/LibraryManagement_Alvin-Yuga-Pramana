<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pustakawan extends Authenticatable
{
    use HasFactory;
    
    use Notifiable;
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'password',
        'remember_token',
        'role',
    ];
    public $timestamps = true;
}
