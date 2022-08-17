<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class def__subgrupo_procedimientos extends Model
{
    protected $table = 'def__subgrupo_procedimientos';
    protected $primary_key = 'id_subgrupo';
    protected $fillable = [
        'codigo_sub',
        'grupo_id',
        'nombre_subgrupo'
    ];
    public function sub_grupo()
    {
        return $this->belongsTo(def__grupo_procedimientos::class, 'id_grupo');
    }
}
