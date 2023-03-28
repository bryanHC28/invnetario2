<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventario extends Model
{
    use HasFactory;


    protected $table = 'inventario';

    protected $fillable = ['id_equipo','stock','id_sucursal','Estado_eliminado'];


    public function equipos(){
    return $this->belongsTo('App\Models\Equipos','id_equipo','id');
    }

}
