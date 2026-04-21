<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComentarioIncidencia extends Model
{
    protected $fillable = [
        'texto',
        'incidencia_id',
        'user_id'
    ];

    public function incidencia()
    {
        return $this->belongsTo(Incidencia::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}