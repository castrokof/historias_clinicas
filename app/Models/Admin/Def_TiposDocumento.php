<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Def__TiposDocumento extends Model
{
    protected $table = 'def__tipos_documentos';
    protected $primary_key = 'id_tipo_doc';
    
    protected $fillable = [

        'cod_tipos_documento',
        'nombre',
        'estado'
    ];
}
