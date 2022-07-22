<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hc_Evolucion_Formulario extends Model
{
    protected $table = 'hc__evolucion__formularios';
    protected $primary_key = 'id_ev_formulario';

    protected $fillable = [
        'id_ev_formulario',
        'evolucion_id',
        'cuestionario',
        'pregunta', //Este es el codigo o id con el que se crea la pregunta en el el cuestinoario
        'respuesta',
        'detelle_respuesta'
    ];
    public function formularioev(){
        return $this->belongsTo(Hc_Evolucion::class, 'id_evolucion');
    }
}
