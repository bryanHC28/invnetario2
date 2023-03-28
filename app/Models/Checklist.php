<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    use HasFactory;

    protected $table = 'checklist';

    protected $fillable = ['id_categoriachecklist','nombre','Estado_eliminado' ];

    public function categoriack(){
    return $this->belongsTo('App\Models\categoriachecklist','id_categoriachecklist','id');
    }

}
