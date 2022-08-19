<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Def_MedicamentosSuministros extends Model
{
    protected $table = 'def__medicamentos_suministros';
    protected $primary_key = 'id_medicamento';
    protected $fillable = [
        'codigo',
        'nombre',
        'detalle',
        'marca',
        'ATC_id',
        'subgrupo_id',
        'IUM',
        'invima',
        'tipo',
        'stock_max',
        'stock_min',
        'cantidad_maxima',
        'cantidad_dias',
        'valor_SOAT',
        'valor_particular',
        'estado'
    ];
    public function medicamentocontrato(){
        return $this->hasMany(rel__contratovsmedicamentos::class, 'medicamento_id');
    }
    public function medicamentoprof(){
        return $this->hasMany(rel__profesionalvsmedicamentos::class, 'medicamento_id');
    }
}
