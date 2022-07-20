<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado_Causas extends Model
{
    protected $table = 'estado_causas';
    protected $primary_key = 'id_causa';
    
    protected $fillable = [
        //Esta tabla es para definir las diferentes causas para anular un documento o factura
        'cod_estado_causas',
        'nombre',
        'estado'
    ];
}
