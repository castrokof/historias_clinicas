<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class def__grupoysubgrupomed extends Model
{
    protected $table = 'def__grupoysubgrupomeds';
    protected $primary_key = 'id';
    protected $fillable = [
        'cod_grupo',
        'nombre_grupo',
        'estado'
    ];
    public function gruposub(){
        return $this->hasMany(def__subgrupomed::class, 'grupo_id');
    }
}
