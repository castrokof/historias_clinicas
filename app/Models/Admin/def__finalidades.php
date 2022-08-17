<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class def__finalidades extends Model
{
    protected $table = 'def__finalidades';
    protected $primary_key = 'id_finalidad';
    protected $fillable = [
        'finalidad',
        'nombre',
        'regimen',
        'eps_empresas_id',
        'servicio_id',
        'edad_min',
        'edad_max',
        'genero',
        'embarazo'
    ];    
    public function eps_finalidad(){
        return $this->belongsTo(Eps_empresa::class, 'id_eps_empresas');
    }
    public function servicio_finalidad(){
        return $this->belongsTo(Servicios::class, 'id_servicio');
    }
}
