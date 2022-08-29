<?php

namespace App\Http\Controllers;

use App\Models\Admin\Cita;
use App\Models\Admin\Paciente;
use App\Models\Seguridad\Usuario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuario_id = $request->session()->get('usuario_id');
        $fechaActual= $request->fechaini." 00:00:01";
        $fechaFinal= $request->fechafin." 23:59:59";
        $estado = null;
        $profesional = $request->profesional;

        if($request->ajax()){
            $datas = DB::table('cita')->select(
            'cita.id_cita as id_cita', 'cita.historia', 'cita.tipo_documento', 'cita.fechahora_cita as fecha_cita', 'cita.fechahora_solicitada as fecha_solicitud', 'cita.cod_profesional', 'cita.papellido',
            'cita.sapellido', 'cita.pnombre', 'cita.snombre',  'cita.estado as estado')
            ->whereBetween('fechahora_cita', [$fechaActual,$fechaFinal])
            ->where('cita.profesional_id', $profesional)
            ->orderBy('cita.fechahora_cita')
            ->get();


        return  DataTables()->of($datas)
        ->addColumn('action', function($datas){
            $checkbox =  '<input type="checkbox" name="case[]" id="'.$datas->id_cita.'" value="' . $datas->id_cita . '" class="case" title="Selecciona Orden"/>';

            return $checkbox;


        })
        ->rawColumns(['action'])
        ->make(true);

     }


     return view('admin.cita.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {

        $rules = array(
            'fechahora'  => 'required|max:40',
            'sede'  => 'required|max:100',
            'usuario_id' => 'required',
            'paciente_id' => 'required',
            'tipo_cita' => 'required'


        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $fechahoracita = $request->fechahora.":00";

       $citaasignada = DB::table('cita')->where([
        ['fechahora', '=', $fechahoracita], ['usuario_id', '=', $request->usuario_id]]
       )->count();


        if($citaasignada>0){

            return response()->json(['success' => 'tomada']);

        }else{


        DB::table('cita')
        ->insert([
        'fechahora' => $fechahoracita,
        'sede' => $request->sede,
        'usuario_id' => $request->usuario_id,
        'paciente_id' => $request->paciente_id,
        'asistio' => 'PROGRAMADA',
        'tipo_cita' => $request->tipo_cita,
        'fechasp' => $request->fechasp,
        'created_at'=>now()
        ]);

            return response()->json(['success' => 'ok']);
        }
    }

    public function selectp(Request $request)
    {

        $pacientes1 = Paciente::orderBy('documento')->select('id_paciente', 'documento', DB::raw("CONCAT(pnombre,' ',papellido) as paciente") )->$request->toArray();

        return response()->json($pacientes1);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function editar($id)
    {

        // $pacientes = Paciente::orderBy('documento')->select('id_paciente', 'documento', DB::raw("CONCAT(pnombre,' ',papellido) as paciente") )->get();
        // $profesionales = Usuario::orderBy('id')->select('id', 'documento', 'especialidad',DB::raw("CONCAT(pnombre,' ',papellido) as profesional") )->get();


        if(request()->ajax()){


            $data = DB::table('cita')
            ->Join('usuario', 'cita.usuario_id', '=', 'usuario.id')
            ->Join('paciente', 'cita.paciente_id', '=', 'paciente.id_paciente')
            ->select(DB::raw('CONCAT(paciente.pnombre," ",paciente.papellido) as paciente'),
             DB::raw('CONCAT(usuario.pnombre," ", usuario.papellido) as profesional'),
            'cita.id_cita as id_cita','cita.asistio as asistio','cita.fechahora as fechahora', 'cita.sede as sede', 'cita.created_at as created_at', 'cita.usuario_id as usuario_id', 'cita.paciente_id as paciente_id', 'cita.tipo_cita as tipo_cita', 'cita.fechasp as fechasp' )
            ->orderBy('cita.id_cita')
            ->where('cita.id_cita', '=', $id)
            ->first();



                return response()->json(['result'=>$data]);

            }
            return view('admin.cita.index', compact('datas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, $id)
    {
        $rules = array(
            'fechahora'  => 'required|max:40',
            'sede'  => 'required|max:100',
            'usuario_id' => 'required',
            'paciente_id' => 'required',
            'tipo_cita' => 'required'

        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $fechahoracita = $request->fechahora.":00";

       $citaasignada = DB::table('cita')->where([
        ['fechahora', '=', $fechahoracita], ['usuario_id', '=', $request->usuario_id]]
       )->count();


        if($citaasignada>0){

            return response()->json(['success' => 'tomada']);

        }else{


        DB::table('cita')
        ->where('id_cita', $id)
        ->update([
        'fechahora' => $fechahoracita,
        'sede' => $request->sede,
        'usuario_id' => $request->usuario_id,
        'paciente_id' => $request->paciente_id,
        'asistio' => 'PROGRAMADA',
        'tipo_cita' => $request->tipo_cita,
        'fechasp' => $request->fechasp,
        'updated_at'=>now()
        ]);
            return response()->json(['success' => 'ok1']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
