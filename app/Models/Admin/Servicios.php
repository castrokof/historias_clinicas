<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    protected $table = 'servicios';
    protected $primary_key = 'id_servicio';
    protected $fillable = [
        'cod_servicio',
        'nombre',
        'estado'
    ];
    public function serviciocontrato(){
        return $this->hasMany(rel__contratovsservicio::class, 'servicio_id');
    }
    public function nivelservicio(){
        return $this->hasMany(Eps_niveles::class, 'servicio_id');
    }
}
