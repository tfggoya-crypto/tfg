<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aviso extends Model
{
    protected $fillable = [
        'edificio_id',
        'user_id',
        'titulo',
        'mensaje',
        'prioridad'
    ];

    public function edificio()
    {
        return $this->belongsTo(Edificio::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}