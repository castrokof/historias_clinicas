<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fc_Factura_Medicamentos extends Model
{
    protected $table = 'fc__factura__medicamentos';
    protected $primary_key = 'id_fc_factura_medicamentos';

    protected $fillable = [
            'factura_id', //Este fk apunta a la tabla factura
            'medicamento_id',
            'cantidad_ordenada',
            'cantidad_entregada',
            'unitario',
            'iva',
            'total_med',
            'pagado',
            'sede_id',
            'servicio_id',
            'profesional_id',
            'contrato_id',
            'CUMS',
            'observaciones'
        
    ];
    public function usuariof()
    {
        return $this->belongsTo(Usuario::class, 'id');
    }
}
