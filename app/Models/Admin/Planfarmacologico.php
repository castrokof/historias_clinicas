<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Planfarmacologico extends Model
{
    protected $table = 'planfarmacologico';
    protected $primary_key = 'id_planf';

    protected $fillable = [

        'codigo_cums',
        'nombre_medto',
        'descripcion_medto',
        'unidad',
        'unidad_referencia',
        'via_administracion',
        'unidad_medida',
        'cantidad',
        'forma_farmaceutica', 
        'dosis', 
        'frecuencia_hora', 
        'frecuencia_minutos', 
        'frecuencia_dia', 
        'duracion_tmto', 
        'total_dosis', 
        'observacion', 
        'cums_id', 
        'historia_id'

    ];

    public function historiap()
    {
        return $this->belongsTo(Historia::class, 'id_historia');
    }

    public function cumsp()
    {
        return $this->belongsTo(Cums::class, 'id_cums');
    }

}
