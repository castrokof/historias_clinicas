<?php

namespace App\Models\Admin;

use App\Models\Seguridad\Usuario;
use App\Models\Admin\Cita;
use App\Models\Admin\Paciente;
use App\Models\Admin\Factura;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Hc_Apertura extends Model
{
    protected $table = 'hc__aperturas';
    protected $primary_key = 'id_apertura';

    protected $fillable = [

        'id_apertura',
        'historia', //Este es el documento del paciente
        'tipo_historia',// Este dato se trae de la tabla hc__def__tipos_historia_clinicas
        'fechahora_ingre',//Fecha y hra en que se crea o se graba la apertura de la historia clinica
        'motivo_consulta',
        'enfermedad_actual',
        'revision_digestiva',
        'revision_cardiovascular',
        'revision_respiratoria',
        'revision_ORL',
        'revision_endocrino',
        'revision_genitourinaria',
        'revision_osteomuscular',
        'revision_sisnervioso',
        'revision_psicologico',
        'ANT_PATOLOGICOS',
        'ANT_QUIRURGICOS',
        'ANT_TOXICOALERGICOS',
        'ANT_HOSPITALIZACION',
        'ANT_TRAUMATICOS',
        'ANT_FARMACOLOGICOS',
        'ANT_INMUNOLOGICOS',
        'ANT_GINECOLOGICOS',
        'ANT_GINEC_GRAVIDEZ',
        'ANT_GINEC_PARTOS',
        'ANT_GINEC_ABORTOS',
        'ANT_GINEC_CESAREAS',
        'ANT_GINEC_ECTOPICOS',
        'ANT_GINEC_VIVOS',
        'ANT_GINEC_MUERTOS',
        'ANT_GINEC_FUPARTO',
        'ANT_GINEC_FUMENSTRUACION',
        'ANT_GINEC_CICLO',
        'ANT_GINEC_DURACION',
        'ANT_GINEC_MENARCA',
        'ANT_GINEC_MENOPAUSIA',
        'ANT_GINEC_INICIOSEXUAL',
        'ANT_GINEC_PAREJAS',
        'ANT_GINEC_EMBARAZO',
        'ANT_GINEC_EDADG',
        'ANT_GINEC_FPPARTO',
        'ANT_GINEC_CITOL_FECHA',
        'ANT_GINEC_CITOL_RESULTADO',
        'ANT_GINEC_COLPOSCOPIAS',
        'ANT_GINEC_LEUCORREA',
        'ANT_GINEC_INFERTILIDAD',
        'ANT_PLANIFICACION',
        'ANT_ETS',
        'ANT_FAMILIARES',
        'ANT_HABITOS',
        'ANT_LABORALES',
        'OBSERVACIONES',
        'paciente_id',
        'usuario_id'
    ];
    public function pacienteaper(){
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }

    public function usuarioaper(){
        return $this->belongsTo(Usuario::class, 'id');
    }
    public function tipoapertura(){
        return $this->belongsTo(Hc_Def_TiposHistoriaClinica::class, 'id_tipo_historia');
    }
}
