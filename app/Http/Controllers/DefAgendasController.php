<?php

namespace App\Http\Controllers;

use App\Models\Admin\Cita;
use App\Models\Admin\Def_Profesionales;
use App\Models\Def_Agendas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\CodeCoverageException;
use Psy\Command\WhereamiCommand;

class DefAgendasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.agenda.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectprofesional(Request $request)
    {
        $profesionales = [];

        if ($request->has('q')) {

            $term = $request->get('q');
            $profesionales = Def_Profesionales::orderBy('id_profesional')
                ->where('nombre', 'LIKE', '%' . $term . '%')
                ->orWhere('codigo', 'LIKE', '%' . $term . '%')
                ->get();
            return response()->json($profesionales);
        } else {

            $profesionales = Def_Profesionales::orderBy('id_profesional')
                ->get();

            return response()->json($profesionales);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {

        $fechaini = $request->fechaini;
        $fechafin = $request->fechafin;
        $festivos = $request->festivos;
        $profesional = $request->profesional;
        $lunes =  $request->lunes;
        $martes =  $request->martes;
        $miercoles =  $request->miercoles;
        $jueves =  $request->jueves;
        $viernes =  $request->viernes;
        $sabado =  $request->sabado;
        $domingo =  $request->domingo;

        $profesionales_det = Def_Profesionales::where('id_profesional', $profesional)->first();


        if ($request->ajax()) {

            // Array fechas
            $fecha = [$fechaini];
            $fechai = [];
            $fechainicio = Carbon::parse($fechaini);
            $fechafinal = Carbon::parse($fechafin);
            $dias = $fechafinal->diffInDays($fechainicio);


            if ($dias == 0) {

                $fechai[] = $fechaini;
            } else {
                $dias = $dias + 1;

                for ($i = 0; $i < $dias; $i++) {


                    $fechai[] = $fechaini;
                    $fechaini=Carbon::createFromFormat('Y-m-d',$fechaini)->addDay(1)->toDateString();

                }
            }

            //Variable count de las fechas
            $pcf = count($fecha);
            dd($pcfi = count($fechai));






            # code...

            if (!empty($fechaini) && !empty($fechafin)) {

                for ($i = 0; $i < $pcfi; $i++) {


                    switch (date('w', strtotime($fechai[$i]))) {

                        case 1:

                            if (!empty($lunes)) {
                                $lunesc = count($lunes);

                                for ($ii = 0; $ii < $lunesc; $ii++) {

                                    $count1 = DB::table('cita')->where([
                                        ['fechahora_cita', $fechai[$i] . ' ' . $lunes[$ii]['horario']],
                                        ['profesional_id', $profesional]
                                    ])->count();

                                    if ($count1 > 0) {
                                        return response()->json(['success' => 'ya']);
                                    }

                                    DB::table('cita')
                                        ->insert([
                                            'fechahora_cita' => $fechai[$i] . ' ' . $lunes[$ii]['horario'],
                                            'profesional_id' => $profesional,
                                            'cod_profesional' => $profesionales_det->codigo,
                                            'nombre_profesional' => $profesionales_det->nombre,
                                            'created_at' => now()

                                        ]);
                                }
                            }
                            break;

                        case 2:
                            if (!empty($martes)) {
                                $martesc = count($martes);

                                for ($ii = 0; $ii < $martesc; $ii++) {

                                    $count1 = DB::table('cita')->where([
                                        ['fechahora_cita', $fechai[$i] . ' ' . $martes[$ii]['horario']],
                                        ['profesional_id', $profesional]
                                    ])->count();

                                    if ($count1 > 0) {
                                        return response()->json(['success' => 'ya']);
                                    }

                                    DB::table('cita')
                                        ->insert([
                                            'fechahora_cita' => $fechai[$i] . ' ' . $martes[$ii]['horario'],
                                            'profesional_id' => $profesional,
                                            'cod_profesional' => $profesionales_det->codigo,
                                            'nombre_profesional' => $profesionales_det->nombre,
                                            'created_at' => now()

                                        ]);
                                }
                            }
                            break;
                        case 3:


                            if (!empty($miercoles)) {
                                $miercolesc = count($miercoles);
                                for ($ii = 0; $ii < $miercolesc; $ii++) {

                                    $count1 = DB::table('cita')->where([
                                        ['fechahora_cita', $fechai[$i] . ' ' . $miercoles[$ii]['horario']],
                                        ['profesional_id', $profesional]
                                    ])->count();

                                    if ($count1 > 0) {
                                        return response()->json(['success' => 'ya']);
                                    }

                                    DB::table('cita')
                                        ->insert([
                                            'fechahora_cita' => $fechai[$i] . ' ' . $miercoles[$ii]['horario'],
                                            'profesional_id' => $profesional,
                                            'cod_profesional' => $profesionales_det->codigo,
                                            'nombre_profesional' => $profesionales_det->nombre,
                                            'created_at' => now()

                                        ]);
                                }
                            }
                            break;
                        case 4:

                            if (!empty($jueves)) {
                                $juevesc = count($jueves);

                                for ($ii = 0; $ii < $juevesc; $ii++) {

                                    $count1 = DB::table('cita')->where([
                                        ['fechahora_cita', $fechai[$i] . ' ' . $jueves[$ii]['horario']],
                                        ['profesional_id', $profesional]
                                    ])->count();

                                    if ($count1 > 0) {
                                        return response()->json(['success' => 'ya']);
                                    }

                                    DB::table('cita')
                                        ->insert([
                                            'fechahora_cita' => $fechai[$i] . ' ' . $jueves[$ii]['horario'],
                                            'profesional_id' => $profesional,
                                            'cod_profesional' => $profesionales_det->codigo,
                                            'nombre_profesional' => $profesionales_det->nombre,
                                            'created_at' => now()

                                        ]);
                                }
                            }

                            break;

                        case 5:

                            if (!empty($viernes)) {
                                $viernesc = count($viernes);

                                for ($ii = 0; $ii < $viernesc; $ii++) {

                                    $count1 = DB::table('cita')->where([
                                        ['fechahora_cita', $fechai[$i] . ' ' . $viernes[$ii]['horario']],
                                        ['profesional_id', $profesional]
                                    ])->count();

                                    if ($count1 > 0) {
                                        return response()->json(['success' => 'ya']);
                                    }

                                    DB::table('cita')
                                        ->insert([
                                            'fechahora_cita' => $fechai[$i] . ' ' . $viernes[$ii]['horario'],
                                            'profesional_id' => $profesional,
                                            'cod_profesional' => $profesionales_det->codigo,
                                            'nombre_profesional' => $profesionales_det->nombre,
                                            'created_at' => now()

                                        ]);
                                }
                            }

                            break;

                        case 6:

                            if (!empty($sabado)) {
                                $sabadoc = count($sabado);

                                for ($ii = 0; $ii < $sabadoc; $ii++) {

                                    $count1 = DB::table('cita')->where([
                                        ['fechahora_cita', $fechai[$i] . ' ' . $sabado[$ii]['horario']],
                                        ['profesional_id', $profesional]
                                    ])->count();

                                    if ($count1 > 0) {
                                        return response()->json(['success' => 'ya']);
                                    }

                                    DB::table('cita')
                                        ->insert([
                                            'fechahora_cita' => $fechai[$i] . ' ' . $sabado[$ii]['horario'],
                                            'profesional_id' => $profesional,
                                            'cod_profesional' => $profesionales_det->codigo,
                                            'nombre_profesional' => $profesionales_det->nombre,
                                            'created_at' => now()

                                        ]);
                                }
                            }
                            break;
                        case 0:

                            if (!empty($domingo)) {
                                $domingoc = count($domingo);
                                for ($ii = 0; $ii < $domingoc; $ii++) {

                                    $count1 = DB::table('cita')->where([
                                        ['fechahora_cita', $fechai[$i] . ' ' . $domingo[$ii]['horario']],
                                        ['profesional_id', $profesional]
                                    ])->count();

                                    if ($count1 > 0) {
                                        return response()->json(['success' => 'ya']);
                                    }

                                    DB::table('cita')
                                        ->insert([
                                            'fechahora_cita' => $fechai[$i] . ' ' . $domingo[$ii]['horario'],
                                            'profesional_id' => $profesional,
                                            'cod_profesional' => $profesionales_det->codigo,
                                            'nombre_profesional' => $profesionales_det->nombre,
                                            'created_at' => now()

                                        ]);
                                }
                            }
                            break;
                        default:
                            # code...
                            break;
                    };
                }

                return response()->json(['success' => 'ok']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Def_Agendas  $def_Agendas
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Def_Agendas  $def_Agendas
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Def_Agendas  $def_Agendas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Def_Agendas  $def_Agendas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }
}
