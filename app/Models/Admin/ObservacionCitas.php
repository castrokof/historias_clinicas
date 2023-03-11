<?php

namespace App\Models\Admin;

use App\Models\Admin\Cita;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObservacionCitas extends Model
{
    protected $table = 'observacion_citas';
    protected $primary_key = 'id_observacion';

    protected $fillable = [

        'observacion_usu',
        'nombre',
        'estado',
        'bloqueo',
        'usuario',
        'cita_id'
    ];
    public function citasObs()
    {
        return $this->hasMany(Cita::class, 'id_cita');
    }
}
