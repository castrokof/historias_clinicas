<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel_programasvspaciente extends Model
{
    protected $table = 'rel__programasvspacientes';
    protected $primary_key = 'id_rel_programasvspacientes';
    protected $fillable = [
        'programa_id',
        'paciente_id',
        'descripcion_programa'
    ];
    public function programapa(){
        return $this->belongsTo(def__programa::class, 'id_programa');
    }
    public function pacienteprog(){
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }
}
