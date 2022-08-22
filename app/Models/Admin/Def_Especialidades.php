<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Def_Especialidades extends Model
{
    protected $table = 'def__especialidades';
    protected $primary_key = 'id_especialidad';
    
    protected $fillable = [

        'codigo',
        'nombre',
        'estado'
    ];
    public function profesespecialidad(){
        return $this->hasMany(Def_Profesionales::class, 'especialidad_id');
    }
}
