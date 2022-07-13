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
        'ciudad',
        'sexo',
        'dpto',
        'eps',
        'estado_solicitud_farma',
        'operador',
        'correo',
        'observaciones',
        'futuro',
        'futuro1',
        'futuro2',
        'futuro3',
        'futuro4'
    ];


    public function historiap(){
        return $this->hasMany(Historia::class, 'paciente_id');
    }

    public function citap(){
        return $this->hasMany(Cita::class, 'paciente_id');
    }

}
