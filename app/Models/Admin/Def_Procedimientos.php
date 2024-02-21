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
        'grupo_id',
        'finalidad_id',
        'descripcion',
        'observacion',
        'genero',
        'edad_1',
        'edad_2',
        'cantidad_maxima',
        'valor_particular',
        'estado'
    ];
    public function procedimientocontrato(){
        return $this->hasMany(rel__contratovsprocedimientos::class, 'procedimiento_id');
    }
    public function procedimientosprof(){
        return $this->hasMany(rel__profesionalvsprocedimientos::class, 'procedimiento_id');
    }
    public function procedimientosserv(){
        return $this->hasMany(rel__serviciovsprocedimientos::class, 'procedimiento_id');
    }
}

/* Consulta para traer los datos de la tabla intermedia rel__serviciovsprocedimientos*/
// SELECT s.cod_servicio,s.nombre,r.cod_cups,r.nombre FROM `rel__serviciovsprocedimientos`p 
// INNER JOIN `servicios` s ON p.servicio_id = s.id_servicio
// INNER JOIN `def__procedimientos` r ON p.procedimiento_id = r.id_cups
// WHERE p.id= 1;