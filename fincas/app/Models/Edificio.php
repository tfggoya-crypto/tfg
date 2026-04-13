<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Edificio extends Model
{
    use HasFactory;

    protected $fillable = ['direccion', 'codigo'];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class);
    }

    public function incidencias()
    {
        return $this->hasMany(Incidencia::class);
    }
}
