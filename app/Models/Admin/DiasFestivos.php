<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiasFestivos extends Model
{
    protected $table = 'dias_festivos';
    protected $primary_key = 'id_festivos';
    
    protected $fillable = [
        'fecha'
    ];
}
