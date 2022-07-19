<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel__profesionalvsservicio extends Model
{
    protected $table = 'rel__profesionalvsservicio';
    protected $primary_key = 'id_profesionalvsservicio';
    protected $fillable = [
        'servicio_id',
        'profesional_id'
    ];
    public function profesionalservicio(){
        return $this->belongsTo(Def_Profesionales::class, 'id_profesional');
    }
    public function servicioprof(){
        return $this->belongsTo(Servicios::class, 'id_servicio');
    }
}
