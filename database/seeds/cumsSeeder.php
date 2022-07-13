<?php

use App\Models\Admin\Cums;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class cumsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cums')->delete();
        $json = File::get('database/data/cums.json');
        $data = json_decode($json);
        foreach ($data as $obj) {
            Cums::create(array(
            'cums' => $obj->cums,
            'invima' => $obj->invima,
            'nombre_medto' => $obj->nombre_medto,
            'descripcion_medto' => $obj->descripcion_medto,
            'unidad' => $obj->unidad,
            'cantidad_cum' => $obj->cantidad_cum,
            'unidad_referencia' => $obj->unidad_referencia,
            'via_administracion' => $obj->via_administracion,
            'unidad_medida' => $obj->unidad_medida,
            'cantidad' => $obj->cantidad,
            'forma_farmaceutica' => $obj->forma_farmaceutica,
            'observacion' => $obj->observacion,
            'estado' => 0

        ));
        }
    }
   }
