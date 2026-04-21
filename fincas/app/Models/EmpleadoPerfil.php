<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpleadoPerfil extends Model
{
    protected $fillable = [
        'user_id',
        'tipo_empleado',
        'horario',
        'salario'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}