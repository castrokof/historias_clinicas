<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Def_Profesionales extends Model
{
    protected $table = 'def__profesionales';
    protected $primary_key = 'id_profesional';
    protected $fillable = [
        'codigo',
        'nombre',
        'reg_profesional',
        'usuario_id',
        'tipo',
        'especialidad_id',
        'fecha_inicio',
        'fecha_fin',
        'min_citas_lunes',
        'min_citas_martes',
        'min_citas_miercoles',
        'min_citas_jueves',
        'min_citas_viernes',
        'min_citas_sabado',
        'min_citas_domingo',
        'estado'
    ];
    public function profesionalmed()
    {
        return $this->hasMany(rel__profesionalvsmedicamentos::class, 'profesional_id');
    }
    public function profesionalproc()
    {
        return $this->hasMany(rel__profesionalvsprocedimientos::class, 'profesional_id');
    }
    public function profesionalserv()
    {
        return $this->hasMany(rel__profesionalvsservicio::class, 'profesional_id');
    }
}
