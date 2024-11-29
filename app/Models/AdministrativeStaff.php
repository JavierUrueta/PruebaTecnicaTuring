<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministrativeStaff extends Model
{
    use HasFactory;

    // Definir los atributos que se pueden asignar masivamente
    protected $fillable = [
        'name',
        'email',
        'phone',
        'role', // Este atributo puede representar el tipo de personal administrativo
    ];

    // Relación con el modelo de usuario si lo vas a usar
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

