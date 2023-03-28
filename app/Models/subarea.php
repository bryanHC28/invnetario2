<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subarea extends Model
{
    use HasFactory;
    protected $table = 'subarea';

    protected $fillable = ['id_area','nombre','Estado_eliminado'];

    public function area(){
    return $this->belongsTo('App\Models\Areas','id_categoriaequipos','id');
    }
}
