<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hc_Def_TiposHistoriaClinica extends Model
{
    protected $table = 'hc__def__tipos_historia_clinicas';
    protected $primary_key = 'id_tipo_historia';
    protected $fillable = [
        'papellido',
        'usuario_id'
    ];
}
