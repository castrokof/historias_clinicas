<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eps_empresa extends Model
{

    protected $table = 'eps_empresas';
    protected $primary_key = 'id_eps_empresas';
    
    protected $fillable = [
        'codigo',
        'nombre',
        'NIT',
        'color',
        'estado'
    ];
    public function pacienteeps(){
        return $this->hasMany(Paciente::class, 'eps_id');
    }
    public function niveleps(){
        return $this->hasMany(Eps_niveles::class, 'eps_empresas_id');
    }
    public function contratoeps(){
        return $this->hasMany(rel__contratovseps::class, 'eps_id');
    }
    public function finalidad_eps(){
        return $this->hasMany(def__finalidades::class, 'eps_empresas_id');
    }

}

