<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel__sedevsprofesional extends Model
{
    // use HasFactory;
    protected $table = 'rel__sedevsprofesionals';
    protected $primary_key = 'id_sedevsprofesionals';
    protected $fillable = [
        'profesional_id',
        'sede_id'
    ];
    public function prof_sede(){
        return $this->belongsTo(Def_Profesionales::class, 'id_profesional');
    }
    public function sede_prof(){
        return $this->belongsTo(Def_Sedes::class, 'id_sede');
    }
}
