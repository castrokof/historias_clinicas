<?php

use App\Models\Admin\Paciente;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PacientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paciente')->delete();
        $json = File::get('database/data/paciente.json');
        $data = json_decode($json);
        foreach ($data as $obj) {
            Paciente::create(array(
            'codigo_cie10' => $obj->codigo,
            'nombre' => $obj->nombre,
            'estado' => 1
            
        ));
        }
    }
}
