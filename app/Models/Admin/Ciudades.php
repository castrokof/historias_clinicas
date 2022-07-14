<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudades extends Model
{
    //use HasFactory;
    protected $table = 'ciudades';
    protected $primary_key = 'id_ciudad';
    
    protected $fillable = [

        'cod_ciudad',
        'nombre',
        'estado'
        
    ];
}
