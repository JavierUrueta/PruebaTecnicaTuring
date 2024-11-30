<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Asegúrate de importar el trait HasFactory
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $fillable = [
        'nombre',
        'correo',
        'password',
        'grado',
        'promedio',
        'rol',
    ];
}
