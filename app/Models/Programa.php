<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'grado_id',
        'facultad_id',
    ];

    public function grado()
    {
        return $this->belongsTo(Grado::class);
    }

    public function facultad()
    {
        return $this->belongsTo(Facultad::class);
    }

    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class);
    }

}
