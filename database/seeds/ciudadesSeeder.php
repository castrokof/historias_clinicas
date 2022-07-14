<?php

//namespace Database\Seeders;

use App\Models\Admin\Ciudades;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ciudadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
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
