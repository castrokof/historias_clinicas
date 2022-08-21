<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Def_Sedes extends Model
{
    protected $table = 'def__sedes';
    protected $primary_key = 'id_sede';
    protected $fillable = [
        'cod_sede',
        'sede',
        'direccion',
        'telefono',
        'email',
        'ciudad_id',
        'logo',
        'estado'
    ];
}
