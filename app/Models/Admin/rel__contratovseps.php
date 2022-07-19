<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel__contratovseps extends Model
{
    protected $table = 'rel__contratovseps';
    protected $primary_key = 'id_contratovseps';
    protected $fillable = [
        'contrato_id',
        'eps_id'
        
    ];
    public function contratoc(){
        return $this->belongsTo(Def_Contratos::class, 'id_contrato');
    }
    public function contratoeps(){
        return $this->belongsTo(Eps_empresa::class, 'id_eps_empresas');
    }
}
