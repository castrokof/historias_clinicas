<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fc_Factura_Procedimientos extends Model
{
    protected $table = 'fc__factura__procedimientos';
    protected $primary_key = 'id_fc_factura_procedimientos';

    protected $fillable = [
        'factura_id', //Este fk apunta a la tabla factura
        'procedimiento_id',
        'codigo_cie10',
        'tipo_diagnostico', // El mismo que se ingresa en la tabla diagnostico
        'cantidad',
        'unitario',
        'total',
        'pagado', //valor del copago o cuota moderadora
        'servicio_id',
        'profesional_id'
    ];
}
