<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel__serviciovsprocedimientos extends Model
{
    protected $table = 'rel__serviciovsprocedimientos';
    protected $primary_key = 'id';
    protected $fillable = [
        'servicio_id',
        'procedimiento_id'
        
    ];
    public function procedimientoserv(){
        return $this->belongsTo(Def_Procedimientos::class, 'id_cups');
    }
    public function servicioprocedimiento(){
        return $this->belongsTo(Servicios::class, 'id_servicio');
    }
}
