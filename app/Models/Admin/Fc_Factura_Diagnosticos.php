<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fc_Factura_Diagnosticos extends Model
{
    protected $table = 'fc__factura__diagnosticos';
    protected $primary_key = 'id_fc_factura_diagnosticos';

    protected $fillable = [
        'cod_documentos',
        'numero_factura',
        'codigo_cie10'
    ];
}
