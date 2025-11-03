<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Espacios extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
           'nombre',
           'descripcion',
           'aforo',
           'idLocalizaciones',
        ];
        protected $hidden = [
            'created_at',
            'updated_at',
        ];
}
