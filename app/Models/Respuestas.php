<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuestas extends Model
{
    use HasFactory;


    protected $table = 'respuestas';

    protected $fillable = ['id_controlmanto','id_sucursal','columnas','observaciones','comentarios','columnas_fotos','fotos','equipo','respuestas','id_usuario_responzable','estatus','Estado_eliminado'];



    public function controlmanto(){
        return $this->belongsTo('App\Models\controlmnto','id_controlmanto','id');
        }


    public function usuario(){
    return $this->belongsTo('App\Models\User','id_contesto','id');
    }

    public function reporte(){
        return $this->belongsTo('App\Models\Reporte','id','id_respuesta');
        }



}
