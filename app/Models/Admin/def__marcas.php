<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class def__marcas extends Model
{
    protected $table = 'def__marcas';
    protected $primary_key = 'id_marca';
    protected $fillable = [
        'cod_marca',
        'nombre_marca',
        'estado'
    ];
    public function marca_med(){
        return $this->belongsTo(Def_MedicamentosSuministros::class, 'id_medicamento');
    }
}
