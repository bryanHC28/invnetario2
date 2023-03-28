<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Equipos extends Model
{
    use HasFactory;
    protected $table = 'equipos';

    protected $fillable = ['id_categoriaequipos','modelo','nombre_equipo','cantidad','id_area','id_sucursal','clave','descripcion','Estado_eliminado'];


    public function categorias(){
    return $this->belongsTo('App\Models\categoriaequipos','id_categoriaequipos','id');
    }

    public function area(){
        return $this->belongsTo('App\Models\Areas','id_area','id');
        }

    public function sucursales(){
            return $this->belongsTo('App\Models\Sucursal','id_sucursal','id');
            }



}
