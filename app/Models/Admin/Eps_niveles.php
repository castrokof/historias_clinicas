<?php

namespace App\Models\Admin;


//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eps_niveles extends Model
{
    //use HasFactory;
    protected $table = 'eps_niveles';
    protected $primary_key = 'id_eps_niveles';
    
    protected $fillable = [

        'codigo_empresa',
        'eps_empresas_id',
        'nivel',
        'descripcion_nivel',        
        'regimen',        
        'tipo_recuperacion',
        'afiliacion',
        'servicios',
        'vlr_copago',
        'estado'   
               
    ];
}
