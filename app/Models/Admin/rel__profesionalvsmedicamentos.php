<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel__profesionalvsmedicamentos extends Model
{
    protected $table = 'rel__profesionalvsmedicamentos';
    protected $primary_key = 'id_profesionalvsmedicamentos';
    protected $fillable = [
        'medicamento_id',
        'profesional_id'
    ];
    public function profesionalmed(){
        return $this->belongsTo(Def_Profesionales::class, 'id_profesional');
    }
    public function medicamentoprof(){
        return $this->belongsTo(Def_MedicamentosSuministros::class, 'id_medicamento');
    }
}
