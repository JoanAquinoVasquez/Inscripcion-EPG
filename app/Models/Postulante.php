<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    use HasFactory;

    protected $fillable=[
        'Ap',
        'Am',
        'Nombres',
        'Correo',
        'DNI',
        'Celular',
        'Fecha_nacimiento',
        'Sexo',
        'Departamento',
        'Provincia',
        'Distrito',
        'Direccion',
    ];
}
