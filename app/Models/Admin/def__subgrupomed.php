<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class def__subgrupomed extends Model
{
    protected $table = 'def__subgrupomeds';
    protected $primary_key = 'id_subgrupo';
    
    protected $fillable = [

        'cod_subgrupo',
        'descripcion_subgrupo',
        'grupo_id'
    ];
    public function subgrupogrupo(){
        return $this->belongsTo(def__grupoysubgrupomed::class, 'id');
    }
}
