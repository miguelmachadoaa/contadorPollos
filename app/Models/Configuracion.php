<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class Configuracion extends Authenticatable
{
    use SoftDeletes;

    protected $table = 'configuration';
    
    protected $fillable = [
        'negocio',
        'direccion',
        'telefono',
        'email',
        'whatsapp',
        'videofooter',
        'show_idioma',
        'user_id'
    ];

  

    
}
