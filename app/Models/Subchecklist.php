<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subchecklist extends Model
{
    use HasFactory;

    protected $table = 'subchecklist';

protected $fillable = ['id_checklist','nombre','status'];

public function checklist(){
return $this->belongsTo('App\Models\Checklist','id_checklist','id');
}

}
