<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel__contratovsmedicamentos extends Model
{
    protected $table = 'rel__contratovsmedicamentos';
    protected $primary_key = 'id_contratovsmedicamento';
    protected $fillable = [
        'contrato_id',
        'medicamento_id',
        'valor'
    ];
    public function contratomed(){
        return $this->belongsTo(Def_Contratos::class, 'id_contrato');
    }
    public function medicamentocontrato(){
        return $this->belongsTo(Def_MedicamentosSuministros::class, 'id_medicamento');
    }
}
