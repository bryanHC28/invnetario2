<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preguntas extends Model
{
    use HasFactory;


    protected $table = 'preguntas';

    protected $fillable = ['id_checklist','tipo_pregunta','orden_pregunta','nombre_pregunta','Estado_eliminado'];


    public function checklist(){
    return $this->belongsTo('App\Models\Checklist','id_checklist','id');
    }

}
