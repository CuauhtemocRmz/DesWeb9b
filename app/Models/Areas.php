<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','descripcion','duracion_turno','intervalo_turno','inicio_turno','inicio_descanso','fin_turno','fin_descanso'];
}
