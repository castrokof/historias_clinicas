<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Def_Procedimientos extends Model
{
    protected $table = 'def__procedimientos';
    protected $primary_key = 'id_cups';
    protected $fillable = [
        'cod_cups',
        'cod_alterno',
        'nombre',
        'grupo',
        'finalidad',
        'descripcion',
        'observacion',
        'genero',
        'edad_1',
        'edad_2',
        'cantidad_maxima',
        'valor_SOAT',
        'valor_particular',
        'estado'
    ];
    public function procedimientocontrato(){
        return $this->hasMany(rel__contratovsprocedimientos::class, 'procedimiento_id');
    }
    public function procedimientosprof(){
        return $this->hasMany(rel__profesionalvsprocedimientos::class, 'procedimiento_id');
    }
}
