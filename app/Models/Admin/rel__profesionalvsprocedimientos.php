<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel__profesionalvsprocedimientos extends Model
{
    protected $table = 'rel__profesionalvsprocedimientos';
    protected $primary_key = 'id_profesionalvsprocedimientos';
    protected $fillable = [
        'procedimiento_id',
        'profesional_id'
    ];
    public function profesionalproc(){
        return $this->belongsTo(Def_Profesionales::class, 'id_profesional');
    }
    public function procedimientosprof(){
        return $this->belongsTo(Def_Procedimientos::class, 'id_cups');
    }
}
