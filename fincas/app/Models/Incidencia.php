<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Incidencia extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion','prioridad','estado','usuario_id','edificio_id'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function edificio()
    {
        return $this->belongsTo(Edificio::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}
