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
        'servicio_id',
        'servicios',
        'vlr_copago',
        'estado'
    ];
    public function niveleps(){
        return $this->belongsTo(Eps_empresa::class, 'id_eps_empresas');
    }
    public function nivelservicio(){
        return $this->belongsTo(Servicios::class, 'id_servicio');
    }
}
