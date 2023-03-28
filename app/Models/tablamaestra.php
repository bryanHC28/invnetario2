<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tablamaestra extends Model
{
    use HasFactory;

    protected $table = 'tablamaestra';

    protected $fillable = ['Equipo','Modelo','Clave','Categoria','Nombre','Area','SigMnto','Id_checklist'];
}
