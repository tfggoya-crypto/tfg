<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpleadoPerfil extends Model
{
    protected $table = 'empleado_perfil';

    protected $fillable = [
        'user_id',
        'horario',
        'salario'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}