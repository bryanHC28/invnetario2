<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
    use HasFactory;

    protected $table = 'areas';

protected $fillable = ['id_sucursal','nombre','status'];

public function sucursales(){
return $this->belongsTo('App\Models\Sucursal','id_sucursal','id');
}
}
