<?php

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
    protected $table = 'paises';
    protected $primary_key = 'id_pais';
    
    protected $fillable = [

        'cod_pais',
        'nombre',
        'estado'
        
    ];
    
}
