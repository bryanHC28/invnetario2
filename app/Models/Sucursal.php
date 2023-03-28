<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;

    protected $table = 'sucursal';

protected $fillable = ['id_empresa','nombre_sucursal','Estado_eliminado'];

public function empresas(){
return $this->belongsTo('App\Models\Empresa','id_empresa','id');
}

}
