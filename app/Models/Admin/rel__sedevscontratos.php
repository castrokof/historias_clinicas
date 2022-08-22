<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel__sedevscontratos extends Model
{
    // use HasFactory;
    protected $table = 'rel__sedevscontratos';
    protected $primary_key = 'id_sedevsprofesionals';
    protected $fillable = [
        'contrato_id',
        'sede_id'
    ];
    public function sede_contrato(){
        return $this->belongsTo(Def_Contratos::class, 'id_contrato');
    }
    public function contrato_sede(){
        return $this->belongsTo(Def_Sedes::class, 'id_sede');
    }
}
