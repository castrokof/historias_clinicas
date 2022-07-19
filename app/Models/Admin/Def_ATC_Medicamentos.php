<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Def_ATC_Medicamentos extends Model
{
    protected $table = 'def__a_t_c__medicamentos';
    protected $primary_key = 'id_ATC';
    protected $fillable = [
        'cod_atc',
        'nombre',
        'consecutivo_forma',
        'forma',
        'concentracion',
        'via_administracion'
        //'estado'
    ];
    public function atcmedicamento(){
        return $this->belongsTo(Def_MedicamentosSuministros::class, 'ATC_id');
    }
}
