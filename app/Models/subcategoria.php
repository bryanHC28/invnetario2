<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subcategoria extends Model
{
    use HasFactory;

    protected $table = 'subcategoria';

    protected $fillable = ['id_categoriaequipos','nombre','Estado_eliminado'];

    public function categoria(){
    return $this->belongsTo('App\Models\categoriaequipos','id_categoriaequipos','id');
    }
}
