<?php

namespace App\Models\Admin;

use App\Models\Seguridad\Usuario;
use App\Models\Admin\Hc_Apertura;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hc_Evolucion extends Model
{
    protected $table = 'hc__evolucions';
    protected $primary_key = 'id_evolucion';

    protected $fillable = [
        'apertura_id',
        'tipo_historia_id',
        'tipo_historia', // Este dato se trae de la tabla hc__def__tipos_historia_clinicas
        'fechahora_evolucion', //Fecha y hra en que se crea o se graba la apertura de la historia clinica
        'cod_documentos', //Este es el codigo de la factura
        'numero_factura', //Este  el consecutivo de la factura
        'cod_documento_internac,ion', //Este es el codigo de la factura cuando se hace admision
        'numero_factura_internacion', //Este es el consecutivo de la factura se hace admision
        'Exa_inspeccion_general',
        'Exa_frecuencia_cardiaca',
        'Exa_frecuencia_respiratoria',
        'Exa_tension_diastolica',
        'Exa_tension_sistolica',
        'Exa_temperatura',
        'Exa_peso',
        'Exa_talla',
        'Exa_perimetro_cintura',
        'Exa_cefalico',
        'Exa_saturacion',
        'Rev_cara',
        'Rev_torax',
        'Rev_abdomen',
        'Rev_genital',
        'Rev_extremidades',
        'Rev_neurologico',
        'Rev_piel',        
        'Evolucion',
        'usuario_id'
    ];
    public function usuarioaper()
    {
        return $this->belongsTo(Usuario::class, 'id');
    }
    public function aperturaevo()
    {
        return $this->belongsTo(Hc_Apertura::class, 'id_apertura');
    }
    public function tipoapertura()
    {
        return $this->belongsTo(Hc_Def_TiposHistoriaClinica::class, 'id_tipo_historia');
    }
}
