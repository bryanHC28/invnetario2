<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;


    protected $table = 'categorias';

    protected $fillable = ['id_area','id_checklist','nombre','status'];

    public function areas(){
    return $this->belongsTo('App\Models\Areas','id_area','id');
    }

    public function checklist(){
    return $this->belongsTo('App\Models\Checklist','id_checklist','id');
    }

}
