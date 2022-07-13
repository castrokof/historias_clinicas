<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Planterapeutico extends Model
{
    protected $table = 'planterapeutico';
    protected $primary_key = 'id_plant';

    protected $fillable = [

        'cod_cups', 
        'nombre', 
        'descripcion', 
        'observacion', 
        'estado', 
        'cups_id', 
        'historia_id', 

    ];

    public function historiad(){
        return $this->belongsTo(Historia::class, 'id_historia');
    }

    public function cupsp(){
        return $this->belongsTo(Cups::class, 'id_cups');
    }
}
