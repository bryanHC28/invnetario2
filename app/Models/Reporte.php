<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;
    protected $table = 'reportes';
    protected $fillable = ['id_respuesta','id_sucursal','id_usuario_receptor','id_usuario_emisor','Estado_eliminado','estatus_cliente','estatus_supervisor'];

    public function respuestas(){
        return $this->belongsTo('App\Models\Respuestas','id_respuesta','id');
        }


    public function usuarios(){
        return $this->belongsTo('App\Models\User','id_usuario_receptor','id');
        }


        public function emisores(){
            return $this->belongsTo('App\Models\User','id_usuario_emisor','id');
            }

            public function sucursal(){
                return $this->belongsTo('App\Models\Sucursal','id_sucursal','id');
                }






}
