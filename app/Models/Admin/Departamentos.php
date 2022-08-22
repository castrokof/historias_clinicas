<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamentos extends Model
{
    protected $table = 'departamentos';
    protected $primary_key = 'id_departamento';
    
    protected $fillable = [

        'cod_departamento',
        'nombre',
        'estado'
    ];
    public function pacientepdep(){
        return $this->hasMany(Departamentos::class, 'departamento_id');
    }
}
