<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoriaequipos extends Model
{
    use HasFactory;
    protected $table = 'categoriaequipos';

    protected $fillable = ['id_area','nombre','Estado_eliminado','id_sucursal'];

    public function areas(){
    return $this->belongsTo('App\Models\Areas','id_area','id');
    }

    public function sucursal(){
        return $this->belongsTo('App\Models\Sucursal','id_sucursal','id');
        }
}
