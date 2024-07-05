<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'cuit',
        'provincia',
        'tipo_persona',
        'sexo',
        'domicilio',
        'fecha_nacimiento',
    ];
}

