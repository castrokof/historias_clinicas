<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{

    protected $table = 'diagnostico';
    protected $primary_key = 'id_diagnostico';
    
    protected $fillable = [

        'tipo',
        'observacion',
        'cie10_id',
        'historia_id'

    ];
    
    public function historiad(){
        return $this->belongsTo(Historia::class, 'id_historia');
    }

    public function cie10(){
        return $this->belongsTo(Cie10::class, 'id_cie10');
    }
}
