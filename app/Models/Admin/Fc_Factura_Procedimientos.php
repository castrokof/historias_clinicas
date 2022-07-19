<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fc_Factura_Procedimientos extends Model
{
    protected $table = 'fc__factura__procedimientos';
    protected $primary_key = 'id_fc_factura_procedimientos';

    protected $fillable = [
        'cod_documentos', //Este es el codigo de la factura
        'numero_factura', //Este es el consecutivo de la factura
        'cod_cups',
        'cod_alterno',
        'fechahora',
        'codigo_cie10',
        'tipo_diagnostico', // El mismo que se ingresa en la tabla diagnostico
        'cantidad',
        'unitario',
        'total',
        'pagado'
    ];
}
