<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Edificio;
use App\Models\Incidencia;
use App\Models\ComentarioIncidencia;
use App\Models\PropietarioPerfil;
use App\Models\EmpleadoPerfil;

class User extends Authenticatable
{
    protected $fillable = [
        'nombre',
        'username',
        'email',
        'password',
        'role',
        'subrole',
        'edificio_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    //Si NO es admin → pertenece a un edificio
    public function edificio()
    {
        return $this->belongsTo(Edificio::class);
    }

    // Admin → muchos edificios
    public function edificiosAdmin()
    {
        return $this->belongsToMany(Edificio::class, 'admin_edificio');
    }

    // Incidencias creadas
    public function incidencias()
    {
        return $this->hasMany(Incidencia::class);
    }

    // Comentarios
    public function comentarios()
    {
        return $this->hasMany(ComentarioIncidencia::class);
    }

    //Perfil propietario
    public function propietarioPerfil()
    {
        return $this->hasOne(PropietarioPerfil::class);
    }

    // Perfil empleado
    public function empleadoPerfil()
    {
        return $this->hasOne(EmpleadoPerfil::class);
    }
}