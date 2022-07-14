<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fc_Factura extends Model
{
    
    protected $table = 'fc__facturas';
    protected $primary_key = 'id_factura';
    
    protected $fillable = [

        'fechahora',
        'papellido',
        'sapellido',
        'pnombre',        
        'snombre', 
        'tipo_documento',
        'documento',
        'plan',   
        'eps_nombre',
        'afiliacion',
        'nivel'
    ];
}
