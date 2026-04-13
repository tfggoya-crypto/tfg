<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','piso','username','password','rol','edificio_id'];

    public function edificio()
    {
        return $this->belongsTo(Edificio::class);
    }

    public function incidencias()
    {
        return $this->hasMany(Incidencia::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}
