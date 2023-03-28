<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salidas extends Model
{
    use HasFactory;


    protected $table = 'salidas';

    protected $fillable = ['id_inventario','cantidad','id_usuario','id_sucursal','Estado_eliminado'];


    public function inventario(){
    return $this->belongsTo('App\Models\inventario','id_inventario','id');
    }

    public function usuario(){
        return $this->belongsTo('App\Models\User','id_usuario','id');
        }
}
