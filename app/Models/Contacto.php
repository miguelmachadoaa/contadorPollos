<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contacto extends Authenticatable
{
    use SoftDeletes;

    protected $table = 'contacto';
    
    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'email',
        'ciudad',
        'pais',
        'mensaje'
    ];

  

    
}
