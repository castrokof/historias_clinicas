<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Def_Documentos extends Model
{
    protected $table = 'def__documentos';
    protected $primary_key = 'id_documento';
    
    protected $fillable = [

        'cod_documentos',
        'nombre',
        'tipo_doc_id',
        'estado'
    ];
    public function documentoconse(){
        return $this->hasMany(def__documentos_consecutivo::class, 'documento_id');
    }
    public function documentotipo(){
        return $this->belongsTo(Def__TiposDocumento::class, 'id_tipo_doc');
    }
}
