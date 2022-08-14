<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel__serviciovsmedicamentos extends Model
{
    protected $table = 'rel__serviciovsmedicamentos';
    protected $primary_key = 'id_serviciovsmedicamentos';
    protected $fillable = [
        'medicamento_id',
        'servicio_id'
        
    ];
    public function medservicio(){
        return $this->belongsTo(Def_MedicamentosSuministros::class, 'id_medicamento');
    }
    public function serviciomed(){
        return $this->belongsTo(Servicios::class, 'id_servicio');
    }
}
