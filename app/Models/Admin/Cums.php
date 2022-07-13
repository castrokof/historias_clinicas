<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Cums extends Model
{
    protected $table = 'cums';
    protected $primary_key = 'id_cums';
    
    protected $fillable = [

        'cums',
        'invima',
        'nombre_medto', 
        'descripcion_medto', 
        'unidad', 
        'cantidad_cum', 
        'unidad_referencia', 
        'via_administracion', 
        'unidad_medida', 
        'cantidad', 
        'forma_farmaceutica', 
        'observacion', 
        'estado',

    ];
    
    public function cumsplan(){
        return $this->hasMany(Planfarmacologico::class, 'cums_id');
    }
}
