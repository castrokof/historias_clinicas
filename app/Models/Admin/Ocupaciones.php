<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ocupaciones extends Model
{
    protected $table = 'ocupaciones';
    protected $primary_key = 'id_ocupacion';
    
    protected $fillable = [

        'codigo',
        'nombre',
        'estado'
    ];
    public function pacienteocu(){
        return $this->hasMany(Paciente::class, 'ocupacion_id');
    }
}
