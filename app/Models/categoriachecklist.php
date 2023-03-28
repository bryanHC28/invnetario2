<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoriachecklist extends Model
{
    use HasFactory;

    protected $table = 'categoriachecklist';


    protected $fillable = ['nombre','Estado_eliminado','id_sucursal'];


    public function sucursal(){
        return $this->belongsTo('App\Models\Sucursal','id_sucursal','id');
        }
}
