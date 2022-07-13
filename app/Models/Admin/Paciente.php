<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'paciente';
    protected $primary_key = 'id_paciente';
    protected $fillable = [
        'papellido',
        'sapellido',
        'pnombre',
        'snombre',
        'tipo_documento',
        'documento',
        'edad',
        'direccion',
        'celular',
        'telefono',
        'solicitud',
        'autorizacion',
        'grupo',
        'plan',
        'Ocupacion',
        'Poblacion_especial',
        'pais_id',  
        'dpto',     
        'ciudad',
        'sexo',
        'orientacion_sexual',        
        'eps',
        'numero_afiliacion',
        'operador',
        'correo',
        'futuro',
        'futuro1',
        'futuro2',
        'futuro3',
        'futuro4',
        'observaciones',
        'estado_solicitud_farma'
        
    ];


    public function historiap(){
        return $this->hasMany(Historia::class, 'paciente_id');
    }

    public function citap(){
        return $this->hasMany(Cita::class, 'paciente_id');
    }

    public function paisesp(){
        return $this->belongsTo(Paises::class, 'pais_id');
    }

}
