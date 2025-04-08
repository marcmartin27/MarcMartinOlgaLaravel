<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nick',
        'password',
        'nombre',
        'apellidos',
        'departamento',
    ];
    
    public function username()
    {
        return 'nick';
    }
    
    public function incidencias()
    {
        return $this->hasMany(Incidencia::class, 'nick', 'nick');
    }
}