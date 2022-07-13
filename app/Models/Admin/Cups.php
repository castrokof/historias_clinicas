<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Cups extends Model
{
    protected $table = 'cups';
    protected $primary_key = 'id_cups';
    
    protected $fillable = [

        'cod_cups',
        'nombre', 
        'descripcion', 
        'observacion', 
        'estado'
               
    ];
    
    public function cupsplan(){
        return $this->hasMany(Planterapeutico::class, 'cups_id');
    }
}
