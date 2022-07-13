<?php

//namespace Database\Seeders;
use App\Models\Admin\Paises;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;



class paisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
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
    }
}
