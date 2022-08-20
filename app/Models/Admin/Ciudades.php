<?php

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Model;

class Ciudades extends Model
{
    //use HasFactory;
    protected $table = 'ciudades';
    protected $primary_key = 'id_ciudad';
    
    protected $fillable = [
        'cod_ciudad',
        'nombre',
        'estado'
    ];
    public function pacientepciu(){
        return $this->hasMany(Ciudades::class, 'ciudad_id');
    }
}
