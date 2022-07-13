<?php

namespace App\Models\Admin;

use App\Models\Seguridad\Usuario;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'cita';
    protected $primary_key = 'id_cita';

    protected $fillable = [

        'fechahora', 
        'sede', 
        'asistio', 
        'paciente_id', 
        'usuario_id',
        'fechasp',
        'fechaspdh',
        'tipo_cita',
        'futuro1',
        'futuro2',
        'futuro3'

    ];

    public function pacientec()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }

    public function usuarioc()
    {
        return $this->belongsTo(Usuario::class, 'id');
    }
}
