<?php

namespace App\Models\Admin;

use App\Models\Seguridad\Usuario;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'cita';
    protected $primary_key = 'id_cita';

    protected $fillable = [

        'fechahora', //Cupo de la cita
        'fechasp',
        'fechaspdh',
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
        'futuro2',
        'futuro3',
        'sede',
        'asistio', //Este es el estado de la cita
        'observaciones',
        'paciente_id',
        'usuario_id'
    ];

    public function pacientec()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }

    public function usuarioc()
    {
        return $this->belongsTo(Usuario::class, 'id');
    }
}
