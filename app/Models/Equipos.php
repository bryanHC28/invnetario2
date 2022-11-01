<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipos extends Model
{
    use HasFactory;
    protected $table = 'equipos';

protected $fillable = ['id_categoria','clave','descripcion','status','SigMMTO'];

public function categorias(){
return $this->belongsTo('App\Models\Categorias','id_categoria','id');
}
}
