<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Def_Contratos extends Model
{
    protected $table = 'def__contratos';
    protected $primary_key = 'id_contrato';
    protected $fillable = [
        'contrato',
        'nombre',
        'descripcion',
        'tipo_contrato',
        'fecha_ini',
        'fecha_fin',
        'estado'
    ];
    public function contratoeps(){
        return $this->hasMany(rel__contratovseps::class, 'contrato_id');
    }
    public function contratomed(){
        return $this->hasMany(rel__contratovsmedicamentos::class, 'contrato_id');
    }
    public function contratoproc(){
        return $this->hasMany(rel__contratovsprocedimientos::class, 'contrato_id');
    }
    public function contratoserv(){
        return $this->hasMany(rel__contratovsservicio::class, 'contrato_id');
    }
}
