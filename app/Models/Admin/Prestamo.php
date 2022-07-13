<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $table = 'prestamo';
    protected $primary_key = 'idp';
    protected $fillable = ['monto', 'monto_pendiente', 'tipo_pago', 'cuotas', 'numero_cuota', 'cuotas_pendientes', 'interes', 'monto_total', 'valor_cuota', 'fecha_inicial', 'fecha_final', 'observacion', 'activo', 'estado', 'usuario_id', 'cliente_id', 'latitud','longitud'];

    public function cliente(){
        return $this->belongsTo(Cliente::class, 'id');
    }

    public function detalle_prestamo(){
        return $this->hasOne(DetallePrestamo::class, 'prestamo_id');
    }
}
