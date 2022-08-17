<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class def__grupo_procedimientos extends Model
{
    protected $table = 'def__grupo_procedimientos';
    protected $primary_key = 'id_grupo';
    protected $fillable = [
        'codigo',
        'nombre_grupo'
    ];
    public function grupo_sub(){
        return $this->hasMany(def__subgrupo_procedimientos::class, 'grupo_id');
    }
}
