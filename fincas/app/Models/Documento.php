<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $fillable = [
        'edificio_id',
        'subido_por',
        'nombre',
        'archivo_url',
        'tipo'
    ];

    public function edificio()
    {
        return $this->belongsTo(Edificio::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'subido_por');
    }
}