<?php

namespace App\Models\Admin;

use App\Models\Seguridad\Usuario;
use Illuminate\Database\Eloquent\Model;

class Historia extends Model
{
    protected $table = 'historia';
    protected $primary_key = 'id_historia';
    
    protected $fillable = [
        'cie10_motivo_consulta',
        'motivo_consulta', 
        'enfermedad_actual', 
        'antecedente_farma', 
        'antecedente_qui', 
        'alergia', 
        'familiares', 
        'traumatico', 
        'presion_arterial_1', 
        'presion_arterial_2', 
        'toma_presion', 
        'frecuencia_cardiaca', 
        'temperatura', 
        'saturacion_oxigeno', 
        'pulson', 
        'cabezacuello', 
        'torax', 
        'abdomen', 
        'extremidad', 
        'genitourinario', 
        'sis_nervioso_cen', 
        'obsteomuscular', 
        'fechahora_ingreso', 
        'recom_covid', 
        'recomendacionespf', 
        'recomendacionespt', 
        'recomendacionesd', 
        'recomendacionesg', 
        'futuro1', 
        'futuro2', 
        'futuro3', 
        'paciente_id', 
        'usuario_id',
        'peso',
        'talla',
        'imc',
        'patologico',
        'hospitalario',
        'toxico',
        'cuello',
        'car_pulmonar'
    ];


    public function paciente(){
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }

    public function medico(){
        return $this->belongsTo(Usuario::class, 'id');
    }

    public function diagnostico(){
        return $this->hasMany(Diagnostico::class, 'historia_id');
    }

    public function plantera(){
        return $this->hasMany(Planterapeutico::class, 'historia_id');
    }

    public function planfarma(){
        return $this->hasMany(Planfarmacologico::class, 'historia_id');
    }

}
