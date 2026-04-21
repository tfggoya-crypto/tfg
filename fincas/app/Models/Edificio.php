<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Incidencia;
use App\Models\Aviso;
use App\Models\Documento;

class Edificio extends Model
{
    protected $fillable = [
        'nombre',
        'direccion',
        'ciudad',
        'codigo_postal'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function admins()
    {
        return $this->belongsToMany(User::class, 'admin_edificio');
    }

    public function incidencias()
    {
        return $this->hasMany(Incidencia::class);
    }



    public function avisos()
    {
        return $this->hasMany(Aviso::class);
    }

    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }


}