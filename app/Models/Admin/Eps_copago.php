<?php

namespace App\Models\Admin;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eps_copago extends Model
{
    //use HasFactory;
    protected $table = 'eps_copago';
    protected $primary_key = 'id_eps_copago';
    
    protected $fillable = [

        'codigo_empresa',
        'eps_niveles_id',
        'eps_empresas_id',
        'regimen',        
        'nombre_regimen',
        'afiliacion',
        'vlr_copago',        
        'estado'        
    ];
}
