<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    protected $fillable = [
        'postulante_id',
        'programa_id',
        'voucher',
        'validado',
    ];

    public function postulante()
    {
        return $this->belongsTo(Postulante::class);
    }

    public function programa()
    {
        return $this->belongsTo(Programa::class);
    }
}
