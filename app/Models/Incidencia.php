<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    protected $fillable = [
        'descripcion', 
        'tipo',
        'estado',
        'nick'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'nick', 'nick');
    }
}