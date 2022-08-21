<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class def__documentos_consecutivo extends Model
{
    protected $table = 'def__documentos_consecutivos';
    protected $primary_key = 'id_documento_consecutivo';
    
    protected $fillable = [

        'documento_id',
        'consecutivo',
        'sede_id',
        'observaciones'
    ];
    public function documentotipo(){
        return $this->belongsTo(Def__Documentos::class, 'id_documento');
    }
}
