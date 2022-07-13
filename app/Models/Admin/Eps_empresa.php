<?php

namespace App\Models\Admin;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eps_empresa extends Model
{
    //use HasFactory;
    protected $table = 'eps_empresas';
    protected $primary_key = 'id_eps_empresas';
    
    protected $fillable = [

        'codigo',
        'nombre',
        'NIT',
        'color',        
        'estado'        
    ];
    public function niveleps(){
        return $this->hasMany(Eps_niveles::class, 'eps_empresas_id');
    }
    
}
