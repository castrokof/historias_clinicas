<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel__contratovsservicio extends Model
{
    protected $table = 'rel__contratovsservicios';
    protected $primary_key = 'id_contratovsservicios';
    protected $fillable = [
        'contrato_id',
        'servicio_id'
    ];
    public function contratoserv(){
        return $this->belongsTo(Def_Contratos::class, 'id_contrato');
    }
    public function serviciocontrato(){
        return $this->belongsTo(Servicios::class, 'id_servicio');
    }
}
