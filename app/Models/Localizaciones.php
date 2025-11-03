<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localizaciones extends Model
{
    use HasFactory;
   
   protected $fillable = [
    'id',
       'nombre',
       'direccion',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
