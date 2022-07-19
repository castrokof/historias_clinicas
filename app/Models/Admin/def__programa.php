<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class def__programa extends Model
{
    protected $table = 'def__programas';
    protected $primary_key = 'id_programa';
    protected $fillable = [
        'descripcion_programa',
        'estado'
    ];
    public function programapa()
    {
        return $this->hasMany(rel_programasvspaciente::class, 'programa_id');
    }
}
