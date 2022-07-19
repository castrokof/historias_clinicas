<?php

namespace App\Models\Admin;

use App\Models\Admin\Paciente;
use App\Models\Admin\Cita;
use App\Models\Seguridad\Usuario;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    //use HasFactory;
    protected $table = 'fc__facturas';
    protected $primary_key = 'id_factura';
    
    protected $fillable = [

        'cod_documentos',
        'numero_factura',
        'fechahora',
        'tipo_documento',
        'documento',
        'papellido',
        'sapellido',
        'pnombre',
        'snombre',
        'edad', 
        'regimen',
        'eps',
        //'plan',
        'eps_nombre',
        'afiliacion',
        'nivel',
        'sede',
        'anulada',
        'causa_id',
        'fecha_anulacion',
        'usuario_anulo',
        'paciente_id',
        'usuario_id'
    ];
    public function pacientef()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }

    public function usuariof()
    {
        return $this->belongsTo(Usuario::class, 'id');
    }
}
