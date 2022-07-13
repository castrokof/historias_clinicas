<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Cie10 extends Model
{
    protected $table = 'cie10';
    protected $primary_key = 'id_cie10';
    
    protected $fillable = [

        'codigo_cie10',
        'nombre',
        'estado',
        
    ];
    
    public function diagnosticoh(){
        return $this->hasMany(Diagnostico::class, 'cie10_id');
    }
}
