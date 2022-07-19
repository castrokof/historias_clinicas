<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel__contratovsprocedimientos extends Model
{
    protected $table = 'rel__contratovsprocedimientos';
    protected $primary_key = 'id_contratovsprocedimiento';
    protected $fillable = [
        'contrato_id',
        'procedimiento_id'
    ];
    public function contratoproc(){
        return $this->belongsTo(Def_Contratos::class, 'id_contrato');
    }
    public function procedimientocontrato(){
        return $this->belongsTo(Def_Procedimientos::class, 'id_cups');
    }
}
