<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuestionario extends Model
{
    use HasFactory;

    protected $table = 'cuestionario';

protected $fillable = ['id_equipo','tipo_pregunta','preguntas','status'];

public function equipos(){
return $this->belongsTo('App\Models\Equipos','id_equipo','id');
}
}
