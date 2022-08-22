<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barrios extends Model
{
    protected $table = 'barrios';
    protected $primary_key = 'id_barrio';
    protected $fillable = [
        'cod_barrio',
        'nombre',
        'estado'
    ];
    public function pacientepbar(){
        return $this->hasMany(Barrios::class, 'barrio_id');
    }
}
