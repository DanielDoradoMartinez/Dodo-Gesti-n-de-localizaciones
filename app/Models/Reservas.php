<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
           'fecha',
           'hora',
           'duracion',
           'idEspacios',
           'idUsers',
           'estado',           
        ];
        protected $hidden = [
            'created_at',
            'updated_at',
        ];
}
