<?php

namespace App\Http\Controllers;

use App\Models\Admin\Cie10;
use App\Models\Admin\Cita;
use App\Models\Admin\Cums;
use App\Models\Admin\Cups;
use App\Models\Admin\Historia;
use App\Models\Admin\Paciente;
use App\Models\Seguridad\Usuario;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HistoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexpaciente(Request $request)
    {
        $usuario_id = $request->session()->get('usuario_id');
        $fechaI = Carbon::now()->toDateString() . " 00:00:00";
        $fechaF = Carbon::now()->toDateString() . " 23:59:59";

        $pacientes = Paciente::orderBy('documento')->select('id_paciente', 'documento', DB::raw("CONCAT(pnombre,' ',papellido) as paciente"))->get();
        $profesionales = Usuario::orderBy('id')->select('id', 'documento', 'especialidad', DB::raw("CONCAT(pnombre,' ',papellido) as profesional"))->get();


        if ($request->ajax()) {
            $datas = DB::table('cita')
                ->Join('usuario', 'cita.usuario_id', '=', 'usuario.id')
                ->Join('paciente', 'cita.paciente_id', '=', 'paciente.id_paciente')
                ->select(
                    DB::raw('CONCAT(paciente.pnombre," ",paciente.papellido) as paciente'),
                    DB::raw('CONCAT(usuario.pnombre," ", usuario.papellido) as profesional'),
                    'cita.id_cita as id_cita',
                    'paciente.id_paciente as id_paciente',
                    'cita.asistio as asistio',
                    'cita.fechahora as fechahora',
                    'cita.sede as sede',
                    'cita.created_at as created_at'
                )
                ->orderBy('cita.id_cita')
                ->whereBetween('cita.fechahora', [$fechaI, $fechaF])
                ->where('cita.usuario_id', '=', $usuario_id)
                ->where('cita.asistio', '=', 'PROGRAMADA')

                ->get();


            return  DataTables()->of($datas)
                ->addColumn('action', function ($datas) {
                    $button = '<button type="button" name="edit" id="' . $datas->id_paciente . '"
        class = "agregarh btn-float  bg-gradient-primary btn-sm tooltipsC"  title="Agregar Historia Clinica"><i class="fa fa-fw fa-plus-circle"></i></a>';

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }


        return view('admin.pacienteprogramado.index', compact('pacientes', 'profesionales'));
    }


    public function index(Request $request)
    {
        $usuario_id = $request->session()->get('usuario_id');
        $fechaI = Carbon::now()->toDateString() . " 00:00:00";
        $fechaF = Carbon::now()->toDateString() . " 23:59:59";


        if ($request->ajax()) {
            $datas = DB::table('historia')
                ->Join('usuario', 'historia.usuario_id', '=', 'usuario.id')
                ->Join('paciente', 'historia.paciente_id', '=', 'paciente.id_paciente')
                ->select(
                    DB::raw('CONCAT(paciente.pnombre," ",paciente.papellido) as paciente'),
                    DB::raw('CONCAT(usuario.pnombre," ", usuario.papellido) as profesional'),
                    'historia.id_historia as id_historia',
                    'paciente.id_paciente as id_paciente',
                    'historia.created_at as created_at'
                )
                ->latest('historia.created_at')
                ->whereBetween('historia.created_at', [$fechaI, $fechaF])
                ->where('historia.usuario_id', '=', $usuario_id)
                ->get();


            return  DataTables()->of($datas)
                ->addColumn('action', function ($datas) {
                    $button = '<button type="button" name="agregardpfpt" id="' . $datas->id_historia . '"
        class = "agregardpfpt btn-float  bg-gradient-warning btn-sm tooltipsC"  title="Agregar Diagnostico y planes"><i class="fas fa-diagnoses"><i class="fa fa-fw fa-plus-circle"></i></i></a>';

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }


        return view('admin.historia.index');
    }

    public function indexpdf(Request $request)
    {
        $usuario_id = $request->session()->get('usuario_id');


        $fechaIn = carbon::now()->toDateString() . " 00:00:00";
        $fechaFi = carbon::now()->toDateString() . " 23:59:59";




        if ($request->ajax()) {

            if (empty($request->documento) && empty($request->tipo_documento && empty($request->fechaini) && empty($request->fechafin))) {

                $datas = DB::table('historia')
                    ->Join('usuario', 'historia.usuario_id', '=', 'usuario.id')
                    ->Join('paciente', 'historia.paciente_id', '=', 'paciente.id_paciente')
                    ->select(
                        DB::raw('CONCAT(paciente.pnombre," ",paciente.papellido) as paciente'),
                        DB::raw('CONCAT(usuario.pnombre," ", usuario.papellido) as profesional'),
                        'historia.id_historia as id_historia',
                        'paciente.id_paciente as id_paciente',
                        'paciente.documento as documento',
                        'historia.created_at as created_at'
                    )
                    ->latest('historia.created_at')
                    ->whereBetween('historia.created_at', [$fechaIn, $fechaFi])
                    ->where('historia.usuario_id', '=', $usuario_id)
                    ->get();


                return  DataTables()->of($datas)
                    ->addColumn('action', function ($datas) {
                        $button = '<button type="button" name="ipdf" id="' . $datas->id_historia . '"
        class = "ipdf btn-float  bg-gradient-warning btn-sm tooltipsC"  title="Imprimir historia"><i class="fa fa-history"><i class="fas fa-download"></i></i></a>';
                        $button .= '&nbsp;<button type="button" name="ior" id="' . $datas->id_historia . '"
        class = "ior btn-float  bg-gradient-info btn-sm tooltipsC"  title="Imprimir ordenes cups"><i class="fas fa-file-medical"><i class="fas fa-download"></i></i></a>';
                        $button .= '&nbsp;<button type="button" name="ifm" id="' . $datas->id_historia . '"
        class = "ifm btn-float  bg-gradient-success btn-sm tooltipsC"  title="Imprimir formula medica"><i class="fas fa-calculator"><i class="fas fa-download"></i></i></a>';

                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            } else {

                $datas = DB::table('historia')
                    ->Join('usuario', 'historia.usuario_id', '=', 'usuario.id')
                    ->Join('paciente', 'historia.paciente_id', '=', 'paciente.id_paciente')
                    ->select(
                        DB::raw('CONCAT(paciente.pnombre," ",paciente.papellido) as paciente'),
                        DB::raw('CONCAT(usuario.pnombre," ", usuario.papellido) as profesional'),
                        'historia.id_historia as id_historia',
                        'paciente.documento as documento',
                        'paciente.id_paciente as id_paciente',
                        'historia.created_at as created_at'
                    )
                    // ->latest('historia.created_at')
                    ->whereBetween('historia.created_at', [$request->fechaini . " 00:00:01", $request->fechafin . " 23:59:59"])
                    ->where('paciente.documento', '=', $request->documento)
                    ->orWhere([['paciente.documento', '=', $request->documento], ['paciente.tipo_documento', '=', $request->tipo_documento]])
                    ->get();


                return  DataTables()->of($datas)
                    ->addColumn('action', function ($datas) {
                        $button = '<button type="button" name="ipdf" id="' . $datas->id_historia . '"
        class = "ipdf btn-float  bg-gradient-warning btn-sm tooltipsC"  title="Imprimir historia"><i class="fa fa-history"><i class="fas fa-download"></i></i></a>';
                        $button .= '&nbsp;<button type="button" name="ior" id="' . $datas->id_historia . '"
        class = "ior btn-float  bg-gradient-info btn-sm tooltipsC"  title="Imprimir ordenes cups"><i class="fas fa-file-medical"><i class="fas fa-download"></i></i></a>';
                        $button .= '&nbsp;<button type="button" name="ifm" id="' . $datas->id_historia . '"
        class = "ifm btn-float  bg-gradient-success btn-sm tooltipsC"  title="Imprimir formula medica"><i class="fas fa-calculator"><i class="fas fa-download"></i></i></a>';

                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }


        return view('admin.historiapdf.index');
    }



    public function indexana(Request $request)
    {

        if ($request->ajax()) {
            $datas = DB::table('historia')
                ->select('id_historia', 'recomendacionesd')
                ->where('id_historia', '=', $request->historia_idp)
                ->get();


            return  DataTables()->of($datas)
                ->make(true);
        }
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectc(Request $request)
    {
        // if(request()->ajax())
        // {
        $cien10c = [];

        if ($request->has('q')) {

            $term = $request->get('q');
            $cien10c = Cie10::orderBy('id_cie10')
                ->where('codigo_cie10', 'LIKE', '%' . $term . '%')
                ->orwhere('nombre', 'LIKE', '%' . $term . '%')
                ->get();
        }

        return response()->json($cien10c);
    }

    public function selectcups()
    {
        if (request()->ajax()) {
            $cupsc = Cups::orderBy('id_cups')->get();
            return response()->json($cupsc);
        }
    }

    public function selectvia()
    {
        if (request()->ajax()) {
            $vias = Cums::groupBy('via_administracion')
                ->orderby('via_administracion')
                ->pluck('via_administracion');
            return response()->json($vias);
        }
    }


    public function selectcums(Request $request)
    {
        $cumsc = [];

        if ($request->has('q')) {

            $term = $request->get('q');
            $cumsc = Cums::orderBy('id_cums')
                ->where('nombre_medto', 'LIKE', '%' . $term . '%')
                ->orwhere('observacion', 'LIKE', '%' . $term . '%')
                ->orwhere('descripcion_medto', 'LIKE', '%' . $term . '%')
                ->get();
            return response()->json($cumsc);
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

        $fechaAi = Carbon::now()->toDateString() . " 00:00:01";
        $fechaAf = Carbon::now()->toDateString() . " 23:59:59";

        if ($request->ajax()) {

            $rules = array(

                'motivo_consulta' => 'max:255',
                'enfermedad_actual' => 'max:255',
                'antecedente_farma' => 'max:255',
                'antecedente_qui' => 'max:255',
                'alergia' => 'max:255',
                'familiares' => 'max:255',
                'traumatico' => 'max:255',
                'cabezacuello' => 'max:255',
                'torax' => 'max:255',
                'abdomen' => 'max:255',
                'extremidad' => 'max:255',
                'genitourinario' => 'max:255',
                'sis_nervioso_cen' => 'max:255',
                'obsteomuscular' => 'max:255',
                'recomendacionesg' => 'max:255'

            );

            $error = Validator::make($request->all(), $rules);

            if ($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            Historia::create($request->all());

            Cita::where([['paciente_id', '=', $request->paciente_id], ['usuario_id', '=', $request->usuario_id]])
                ->whereBetween('fechahora', [$fechaAi, $fechaAf])
                ->update([ 'asistio' => 'EN CONSULTA', ]);

            return response()->json(['success' => 'ok']);
        }
    }
    //Exportar pdf de historia clinica
    public function exportarhpdf(Request $request)
    {
        if (!empty($request->idh)) {

            $datas = DB::table('historia')
                ->Join('usuario', 'historia.usuario_id', '=', 'usuario.id')
                ->Join('paciente', 'historia.paciente_id', '=', 'paciente.id_paciente')
                ->select(
                    'paciente.pnombre as pnombre_p',
                    'paciente.snombre  as snombre_p',
                    'paciente.papellido  as papellido_p',
                    'paciente.sapellido  as sapellido_p',
                    'paciente.tipo_documento  as tipo_documento_p',
                    'paciente.documento  as documento_p',
                    'paciente.sexo as sexo_p',
                    'paciente.edad as edad_p',
                    'paciente.plan as plan_p',
                    'paciente.eps as eps_p',
                    'usuario.pnombre as pnombre_u',
                    'usuario.snombre  as snombre_u',
                    'usuario.papellido  as papellido_u',
                    'usuario.sapellido as sapellido_u',
                    'usuario.especialidad as especialidad_u',
                    'historia.created_at as created_at_h',
                    'historia.id_historia as id_historia_h'
                )
                ->where('historia.id_historia', '=', $request->idh)
                ->get();


            $datas1 = DB::table('historia')
                ->select(
                    'historia.created_at as created_at_h',
                    'historia.id_historia as id_historia_h',
                    'historia.motivo_consulta',
                    'historia.enfermedad_actual',
                    'historia.antecedente_farma',
                    'historia.antecedente_qui',
                    'historia.alergia',
                    'historia.familiares',
                    'historia.traumatico',
                    'historia.patologico',
                    'historia.hospitalario',
                    'historia.toxico',
                    'historia.presion_arterial_1',
                    'historia.presion_arterial_2',
                    'historia.frecuencia_cardiaca',
                    'historia.pulson',
                    'historia.saturacion_oxigeno',
                    'historia.temperatura',
                    'historia.peso',
                    'historia.talla',
                    'historia.imc',
                    'historia.cabezacuello',
                    'historia.cuello',
                    'historia.torax',
                    'historia.car_pulmonar',
                    'historia.abdomen',
                    'historia.genitourinario',
                    'historia.sis_nervioso_cen',
                    'historia.obsteomuscular',
                    'historia.extremidad',
                    'historia.recomendacionesg',
                    'historia.recomendacionesd'
                )
                ->where('historia.id_historia', '=', $request->idh)
                ->get();



            $datas2 = DB::table('historia')
                ->Join('diagnostico', 'historia.id_historia', '=', 'diagnostico.historia_id')
                ->Join('cie10', 'diagnostico.cie10_id', '=', 'cie10.id_cie10')
                ->select('diagnostico.tipo as tipo_d', 'diagnostico.observacion as obs_d', 'cie10.codigo_cie10', 'cie10.nombre as nombre_cie10')
                ->where('historia.id_historia', '=', $request->idh)
                ->get();

            $datas3 = DB::table('historia')
                ->Join('planterapeutico', 'historia.id_historia', '=', 'planterapeutico.historia_id')
                ->Join('cups', 'planterapeutico.cups_id', '=', 'cups.id_cups')
                ->select('planterapeutico.observacion as obs_pt', 'cups.cod_cups', 'cups.nombre as nombre_cups')
                ->where('historia.id_historia', '=', $request->idh)
                ->get();

            $datas4 = DB::table('historia')
                ->Join('planfarmacologico', 'historia.id_historia', '=', 'planfarmacologico.historia_id')
                ->Join('cums', 'planfarmacologico.cums_id', '=', 'cums.id_cums')
                ->select(
                    'planfarmacologico.observacion as obs_pf',
                    'planfarmacologico.via_administracion',
                    'planfarmacologico.dosis',
                    'planfarmacologico.frecuencia_hora',
                    'planfarmacologico.duracion_tmto',
                    'planfarmacologico.total_dosis',
                    'cums.cums',
                    'cums.nombre_medto',
                    'cums.descripcion_medto',
                    'cums.unidad',
                    'cums.cantidad_cum',
                    'cums.unidad_referencia',
                    'cums.forma_farmaceutica',
                    'cums.unidad_medida',
                    'cums.cantidad',
                    'cums.observacion as obs_cums'
                )
                ->where('historia.id_historia', '=', $request->idh)
                ->get();
        }



        $pdf = PDF::loadView('admin.historiapdf.pdfs.pdfhistoria', compact('datas', 'datas1', 'datas2', 'datas3', 'datas4'));
        $pdf->getDomPDF()->setHttpContext(
            stream_context_create([
                'ssl' => [
                    'allow_self_signed' => TRUE,
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                ]
            ])
        );
        return $pdf->download('H' . '--' . $request->idh . '--' . 'Historia.pdf');
    }

    //Exportar pdf de Ordenes
    public function exportaropdf(Request $request)
    {
        if (!empty($request->idh)) {

            $datas = DB::table('historia')
                ->Join('usuario', 'historia.usuario_id', '=', 'usuario.id')
                ->Join('paciente', 'historia.paciente_id', '=', 'paciente.id_paciente')
                ->select(
                    'paciente.pnombre as pnombre_p',
                    'paciente.snombre  as snombre_p',
                    'paciente.papellido  as papellido_p',
                    'paciente.sapellido  as sapellido_p',
                    'paciente.tipo_documento  as tipo_documento_p',
                    'paciente.documento  as documento_p',
                    'paciente.sexo as sexo_p',
                    'paciente.edad as edad_p',
                    'paciente.plan as plan_p',
                    'paciente.eps as eps_p',
                    'usuario.pnombre as pnombre_u',
                    'usuario.snombre  as snombre_u',
                    'usuario.papellido  as papellido_u',
                    'usuario.sapellido as sapellido_u',
                    'usuario.especialidad as especialidad_u',
                    'historia.created_at as created_at_h',
                    'historia.id_historia as id_historia_h'
                )
                ->where('historia.id_historia', '=', $request->idh)
                ->get();


            $datas1 = DB::table('historia')
                ->select(
                    'historia.created_at as created_at_h',
                    'historia.id_historia as id_historia_h',
                    'historia.motivo_consulta',
                    'historia.enfermedad_actual',
                    'historia.antecedente_farma',
                    'historia.antecedente_qui',
                    'historia.alergia',
                    'historia.familiares',
                    'historia.traumatico',
                    'historia.patologico',
                    'historia.hospitalario',
                    'historia.toxico',
                    'historia.presion_arterial_1',
                    'historia.presion_arterial_2',
                    'historia.frecuencia_cardiaca',
                    'historia.pulson',
                    'historia.saturacion_oxigeno',
                    'historia.temperatura',
                    'historia.peso',
                    'historia.talla',
                    'historia.imc',
                    'historia.cabezacuello',
                    'historia.cuello',
                    'historia.torax',
                    'historia.car_pulmonar',
                    'historia.abdomen',
                    'historia.genitourinario',
                    'historia.sis_nervioso_cen',
                    'historia.obsteomuscular',
                    'historia.extremidad',
                    'historia.recomendacionesg',
                    'historia.recomendacionesd'
                )
                ->where('historia.id_historia', '=', $request->idh)
                ->get();



            $datas2 = DB::table('historia')
                ->Join('diagnostico', 'historia.id_historia', '=', 'diagnostico.historia_id')
                ->Join('cie10', 'diagnostico.cie10_id', '=', 'cie10.id_cie10')
                ->select('diagnostico.tipo as tipo_d', 'diagnostico.observacion as obs_d', 'cie10.codigo_cie10', 'cie10.nombre as nombre_cie10')
                ->where('historia.id_historia', '=', $request->idh)
                ->get();

            $datas3 = DB::table('historia')
                ->Join('planterapeutico', 'historia.id_historia', '=', 'planterapeutico.historia_id')
                ->Join('cups', 'planterapeutico.cups_id', '=', 'cups.id_cups')
                ->select('planterapeutico.observacion as obs_pt', 'cups.cod_cups', 'cups.nombre as nombre_cups')
                ->where('historia.id_historia', '=', $request->idh)
                ->get();

            $datas4 = DB::table('historia')
                ->Join('planfarmacologico', 'historia.id_historia', '=', 'planfarmacologico.historia_id')
                ->Join('cums', 'planfarmacologico.cums_id', '=', 'cums.id_cums')
                ->select(
                    'planfarmacologico.observacion as obs_pf',
                    'planfarmacologico.via_administracion',
                    'planfarmacologico.dosis',
                    'planfarmacologico.frecuencia_hora',
                    'planfarmacologico.duracion_tmto',
                    'planfarmacologico.total_dosis',
                    'cums.cums',
                    'cums.nombre_medto',
                    'cums.descripcion_medto',
                    'cums.unidad',
                    'cums.cantidad_cum',
                    'cums.unidad_referencia',
                    'cums.forma_farmaceutica',
                    'cums.unidad_medida',
                    'cums.cantidad',
                    'cums.observacion as obs_cums'
                )
                ->where('historia.id_historia', '=', $request->idh)
                ->get();
        }



        $pdf = PDF::loadView('admin.historiapdf.pdfs.pdfhistoria', compact('datas', 'datas1', 'datas2', 'datas3', 'datas4'));
        $pdf->getDomPDF()->setHttpContext(
            stream_context_create([
                'ssl' => [
                    'allow_self_signed' => TRUE,
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                ]
            ])
        );
        return $pdf->stream('H' . '--' . $request->idh . '--' . 'Historia.pdf');
    }


    //Exportar pdf de Formula medica
    public function exportarfpdf(Request $request)
    {
        if (!empty($request->idh)) {

            $datas = DB::table('historia')
                ->Join('usuario', 'historia.usuario_id', '=', 'usuario.id')
                ->Join('paciente', 'historia.paciente_id', '=', 'paciente.id_paciente')
                ->select(
                    'paciente.pnombre as pnombre_p',
                    'paciente.snombre  as snombre_p',
                    'paciente.papellido  as papellido_p',
                    'paciente.sapellido  as sapellido_p',
                    'paciente.tipo_documento  as tipo_documento_p',
                    'paciente.documento  as documento_p',
                    'paciente.sexo as sexo_p',
                    'paciente.edad as edad_p',
                    'paciente.plan as plan_p',
                    'paciente.eps as eps_p',
                    'usuario.pnombre as pnombre_u',
                    'usuario.snombre  as snombre_u',
                    'usuario.papellido  as papellido_u',
                    'usuario.sapellido as sapellido_u',
                    'usuario.especialidad as especialidad_u',
                    'historia.created_at as created_at_h',
                    'historia.id_historia as id_historia_h'
                )
                ->where('historia.id_historia', '=', $request->idh)
                ->get();


            $datas1 = DB::table('historia')
                ->select(
                    'historia.created_at as created_at_h',
                    'historia.id_historia as id_historia_h',
                    'historia.motivo_consulta',
                    'historia.enfermedad_actual',
                    'historia.antecedente_farma',
                    'historia.antecedente_qui',
                    'historia.alergia',
                    'historia.familiares',
                    'historia.traumatico',
                    'historia.patologico',
                    'historia.hospitalario',
                    'historia.toxico',
                    'historia.presion_arterial_1',
                    'historia.presion_arterial_2',
                    'historia.frecuencia_cardiaca',
                    'historia.pulson',
                    'historia.saturacion_oxigeno',
                    'historia.temperatura',
                    'historia.peso',
                    'historia.talla',
                    'historia.imc',
                    'historia.cabezacuello',
                    'historia.cuello',
                    'historia.torax',
                    'historia.car_pulmonar',
                    'historia.abdomen',
                    'historia.genitourinario',
                    'historia.sis_nervioso_cen',
                    'historia.obsteomuscular',
                    'historia.extremidad',
                    'historia.recomendacionesg',
                    'historia.recomendacionesd'
                )
                ->where('historia.id_historia', '=', $request->idh)
                ->get();



            $datas2 = DB::table('historia')
                ->Join('diagnostico', 'historia.id_historia', '=', 'diagnostico.historia_id')
                ->Join('cie10', 'diagnostico.cie10_id', '=', 'cie10.id_cie10')
                ->select('diagnostico.tipo as tipo_d', 'diagnostico.observacion as obs_d', 'cie10.codigo_cie10', 'cie10.nombre as nombre_cie10')
                ->where('historia.id_historia', '=', $request->idh)
                ->get();

            $datas3 = DB::table('historia')
                ->Join('planterapeutico', 'historia.id_historia', '=', 'planterapeutico.historia_id')
                ->Join('cups', 'planterapeutico.cups_id', '=', 'cups.id_cups')
                ->select('planterapeutico.observacion as obs_pt', 'cups.cod_cups', 'cups.nombre as nombre_cups')
                ->where('historia.id_historia', '=', $request->idh)
                ->get();

            $datas4 = DB::table('historia')
                ->Join('planfarmacologico', 'historia.id_historia', '=', 'planfarmacologico.historia_id')
                ->Join('cums', 'planfarmacologico.cums_id', '=', 'cums.id_cums')
                ->select(
                    'planfarmacologico.observacion as obs_pf',
                    'planfarmacologico.via_administracion',
                    'planfarmacologico.dosis',
                    'planfarmacologico.frecuencia_hora',
                    'planfarmacologico.duracion_tmto',
                    'planfarmacologico.total_dosis',
                    'cums.cums',
                    'cums.nombre_medto',
                    'cums.descripcion_medto',
                    'cums.unidad',
                    'cums.cantidad_cum',
                    'cums.unidad_referencia',
                    'cums.forma_farmaceutica',
                    'cums.unidad_medida',
                    'cums.cantidad',
                    'cums.observacion as obs_cums'
                )
                ->where('historia.id_historia', '=', $request->idh)
                ->get();
        }



        $pdf = PDF::loadView('admin.historiapdf.pdfs.pdfformula', compact('datas', 'datas1', 'datas2', 'datas3', 'datas4'));
        $pdf->getDomPDF()->setHttpContext(
            stream_context_create([
                'ssl' => [
                    'allow_self_signed' => TRUE,
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                ]
            ])
        );
        foreach ($datas as $datas1) {

            return $pdf->download($datas1->pnombre_p . '--' . $datas1->papellido_p . '--H--' . $request->idh . '--' . 'Formula.pdf');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editarp($id)
    {

        $cie10_motivo_consultas = Cie10::orderBy('id_cie10')->select('codigo_cie10', 'nombre')->get();
        $datas = Paciente::where('id_paciente', $id)->first();


        return view('admin.pacienteprogramado.historia', compact('datas', 'cie10_motivo_consultas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function insertaranalisis(Request $request, $id)
    {

        DB::table('historia')->where('id_historia', '=', $request->historia_id)
            ->update([
                'recomendacionesd' => $request->recomendacionesd,

            ]);

        return response()->json(['success' => 'ok']);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar(Request $request, $id)
    {


        if ($request->ajax()) {
            $data = DB::table('historia')
                ->Join('paciente', 'historia.paciente_id', '=', 'paciente.id_paciente')
                ->where('historia.id_historia', '=', $id)
                ->get();



            return response()->json(['result' => $data]);
        }
        return view('admin.historia.index');
    }
}
