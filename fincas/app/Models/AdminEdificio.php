<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminEdificio extends Model
{
    protected $table = 'admin_edificio';

    protected $fillable = [
        'user_id',
        'edificio_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function edificio()
    {
        return $this->belongsTo(Edificio::class);
    }
}