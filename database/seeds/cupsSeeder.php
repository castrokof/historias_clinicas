<?php

use App\Models\Admin\Cups;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class cupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cups')->delete();
        $json = File::get('database/data/cups.json');
        $data = json_decode($json);
        foreach ($data as $obj) {
            Cups::create(array(
            'cod_cups' => $obj->codigo,
            'nombre' => $obj->nombre,
            'estado' => 1
            
        ));
        }
    }
}
