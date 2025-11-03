<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorariosHasEspacios extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
           'idEspacios',
           'idHorarios',
        ];
        protected $hidden = [
            'created_at',
            'updated_at',
        ];
}
