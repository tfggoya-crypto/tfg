<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropietarioPerfil extends Model
{
    protected $fillable = [
        'user_id',
        'dni',
        'telefono',
        'numero_vivienda'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}