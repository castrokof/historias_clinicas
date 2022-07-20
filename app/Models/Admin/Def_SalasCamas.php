<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Def_SalasCamas extends Model
{
    protected $table = 'def__salas_camas';
    protected $primary_key = 'id_salas_camas';
    
    protected $fillable = [

        'codigo',
        'nombre',
        'estado'
    ];
}
