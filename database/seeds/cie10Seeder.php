<?php

use App\Models\Admin\Cie10;
use Carbon\Carbon;
use App\Models\Admin\Paises;
use App\Models\Admin\Ciudades;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class cie10Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cie10')->delete();
        $json = File::get('database/data/cie10.json');
        $data = json_decode($json);
        foreach ($data as $obj) {
            Cie10::create(array(
                'codigo_cie10' => $obj->codigo,
                'nombre' => $obj->nombre,
                'estado' => 1

            ));
        }

        DB::table('paises')->delete();
        $json = File::get('database/data/paises.json');
        $data = json_decode($json);
        foreach ($data as $obj) {
            Paises::create(array(
                'cod_pais' => $obj->cod_pais,
                'nombre' => $obj->nombre,
                'estado' => 1

            ));
        }

        DB::table('ciudades')->delete();
        $json = File::get('database/data/ciudades.json');
        $data = json_decode($json);
        foreach ($data as $obj) {
            Ciudades::create(array(
                'cod_ciudad' => $obj->cod_ciudad,
                'nombre' => $obj->nombre,
                'estado' => 1

            ));
        }
    }
}
