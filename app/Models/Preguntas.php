<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preguntas extends Model
{
    use HasFactory;

    protected $table = 'preguntas';

    protected $fillable = ['id_checklist','id_subchecklist','tipo_pregunta','nombre_pregunta','status'];

    public function checklist(){
    return $this->belongsTo('App\Models\Equipos','id_checklist','id');
    }

    public function subchecklist(){
    return $this->belongsTo('App\Models\Subchecklist','id_subchecklist','id');
    }

}
