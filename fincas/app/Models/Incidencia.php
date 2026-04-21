<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    protected $fillable = [
        'titulo',
        'descripcion',
        'estado',
        'prioridad',
        'user_id',
        'edificio_id',
        'asignado_a'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function edificio()
    {
        return $this->belongsTo(Edificio::class);
    }

    public function asignado()
    {
        return $this->belongsTo(User::class, 'asignado_a');
    }

    public function comentarios()
    {
        return $this->hasMany(ComentarioIncidencia::class);
    }
}