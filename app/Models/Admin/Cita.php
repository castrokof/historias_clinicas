<?php

namespace App\Models\Admin;

use App\Models\Seguridad\Usuario;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'cita';
    protected $primary_key = 'id_cita';

    protected $fillable = [

        'fechahora_cita', //Cupo de la cita
        'fechahora_solicitud',
        'fechahora_solicitada',
        'orden',
        'fechasp',
        'fechaspdh',
        'tipo_solicitud',
        'ips',
        'tipo_documento', //Ej: CC, TI, CE,
        'historia', //Este es el numero de documento del paciente
        'papellido',
        'sapellido',
        'pnombre',
        'snombre',
        'cod_documentos', //Este es el codigo de la factura
        'numero_factura', //Este es el consecutivo de la factura
        'servicio', //Este dato corresponde al centro de produccion
        'cod_profesional', //Este dato se captura de la tabla def__profesionales
        'cod_cups', //Este dato se captura de la tabla def__procedimientos
        'contrato', //Este dato se captura de la tabla def__contratos
        'regimen',
        'eps',
        'nivel',
        'tipo_cita',
        'futuro1',
        'futuro2', // Este campo es la fecha de nacimiento del paciente
        'futuro3',
        'doc_hospitalizacion',
        'orden_hospitalizacion',
        'atencion_hospitalizacion',
        'sede',
        'estado', //Este es el estado de la cita
        'bloqueo',
        'usuario', //Este es el nombre del usuario que agenda la cita
        'profesional_id',
        'cups_id',
        'contrato_id',
        'factura_id',
        'servicio_id',
        'paciente_id',
        'usuario_id'
    ];

    public function pacientec()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    public function usuarioc()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function servicio()
    {
        return $this->belongsTo(Servicios::class, 'servicio_id');
    }

    public function cups()
    {
        return $this->belongsTo(Def_Procedimientos::class, 'cups_id');
    }

    public function contrato()
    {
        return $this->belongsTo(Def_Contratos::class, 'contrato_id');
    }
    public function profesionalId()
    {
        return $this->belongsTo(Def_Profesionales::class, 'profesional_id');
    }
}
