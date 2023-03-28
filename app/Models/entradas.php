<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class entradas extends Model
{
    use HasFactory;

    protected $table = 'entradas';

    protected $fillable = ['id_inventario','id_sucursal','cantidad','id_usuario','Estado_eliminado'];


    public function inventario(){
    return $this->belongsTo('App\Models\inventario','id_inventario','id');
    }

    public function usuario(){
        return $this->belongsTo('App\Models\User','id_usuario','id');
        }
}
