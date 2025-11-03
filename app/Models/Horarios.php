<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horarios extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
           'horaInicio',
           'horaFin',
           'diaSemana',
           'intervaloHorario',
        ];
        protected $hidden = [
            'created_at',
            'updated_at',
        ];
}
