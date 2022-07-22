<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fc_Factura_Medicamentos extends Model
{
    protected $table = 'fc__factura__medicamentos';
    protected $primary_key = 'id_fc_factura_medicamentos';

    protected $fillable = [
        'cod_documentos',
        'numero_factura',        
        'codigo',
        'cantidad_ordenada',
        'cantidad_entregada',
        'unitario',
        'total',
        'pagado',
        'servicio',
        'profesional',
        'CUMS',
        'observaciones'
        
    ];
    public function usuariof()
    {
        return $this->belongsTo(Usuario::class, 'id');
    }
}
