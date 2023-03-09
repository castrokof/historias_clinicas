<?php

namespace App\Http\Controllers;

use App\Models\Admin\Cita;
use App\Models\Admin\Paciente;
use App\Models\Admin\Servicios;
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
        $fechaActual = $request->fechaini . " 00:00:01";
        $fechaFinal = $request->fechafin . " 23:59:59";
        $estado = null;
        $profesional = $request->profesional;

        if ($request->ajax()) {
            $datas = DB::table('cita')->select(
                'cita.id_cita as id_cita',
                'cita.historia',
                'cita.tipo_documento',
                'cita.fechahora_cita as fecha_cita',
                'cita.fechahora_solicitada as fecha_solicitud',
                'cita.cod_profesional',
                'cita.papellido',
                'cita.sapellido',
                'cita.pnombre',
                'cita.snombre',
                'cita.estado as estado',
                'cita.cod_documentos as doc_factura',
                'cita.numero_factura as factura',
                'cita.servicio as servicio',
                'cita.contrato as contrato',
                'cita.futuro1 as celular',
                'cita.cod_cups as cod_cups'
            )
                ->whereBetween('fechahora_cita', [$fechaActual, $fechaFinal])
                ->where('cita.profesional_id', $profesional)
                ->orderBy('cita.fechahora_cita')
                ->get();


            return  DataTables()->of($datas)
                ->addColumn('action', function ($datas) {
                    $checkbox =  '<input type="checkbox" name="case[]" id="' . $datas->id_cita . '" value="' . $datas->id_cita . '" class="case" title="Selecciona Orden"/>';

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

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $fechahoracita = $request->fechahora . ":00";

        $citaasignada = DB::table('cita')->where(
            [
                ['fechahora', '=', $fechahoracita], ['usuario_id', '=', $request->usuario_id]
            ]
        )->count();


        if ($citaasignada > 0) {

            return response()->json(['success' => 'tomada']);
        } else {


            DB::table('cita')
                ->insert([
                    'fechahora' => $fechahoracita,
                    'sede' => $request->sede,
                    'usuario_id' => $request->usuario_id,
                    'paciente_id' => $request->paciente_id,
                    'asistio' => 'PROGRAMADA',
                    'tipo_cita' => $request->tipo_cita,
                    'fechasp' => $request->fechasp,
                    'created_at' => now()
                ]);

            return response()->json(['success' => 'ok']);
        }
    }

    public function selectp(Request $request)
    {

        $pacientes1 = Paciente::orderBy('documento')->select('id_paciente', 'documento', DB::raw("CONCAT(pnombre,' ',papellido) as paciente"))->$request->toArray();

        return response()->json($pacientes1);
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
        if (request()->ajax()) {
            $datas2 = Cita::join('paciente', 'paciente.id_paciente', '=', 'cita.paciente_id')
                ->join('usuario', 'usuario.id', '=', 'cita.usuario_id')
                ->leftJoin('paises', 'paciente.pais_id', '=', 'paises.id_pais')
                ->join('servicios', 'servicios.id_servicio', '=', 'cita.servicio_id')
                ->join('def__profesionales', 'def__profesionales.id_profesional', '=', 'cita.profesional_id')
                ->join('def__contratos', 'def__contratos.id_contrato', '=', 'cita.contrato_id')
                ->join('def__procedimientos', 'def__procedimientos.id_cups', '=', 'cita.cups_id')
                ->where('cita.id_cita', $id)
                ->select(
                    'cita.*',
                    'paciente.edad as paciente_edad',
                    'paciente.direccion as paciente_direccion',
                    'paises.nombre as nombre_pais',
                    /* DB::raw("IFNULL(paises.nombre, '') as nombre_pais"), */
                    DB::raw("CONCAT(def__profesionales.codigo, ' - ', def__profesionales.nombre) as prof_nombre"),
                    DB::raw("CONCAT(servicios.cod_servicio, ' - ', servicios.nombre) as servicio_nombre"),
                    DB::raw("CONCAT(def__contratos.contrato, ' - ', def__contratos.nombre) as contrato_nombre"),
                    DB::raw("CONCAT(def__procedimientos.cod_cups, ' - ', def__procedimientos.nombre) as cups")
                )
                ->first();

            return response()->json(['result' => $datas2]);
        }
        return view('admin.cita.index');
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
            'fechahora_solicitada',
            'fechahora_solicitud',
            'ips'  => 'required|max:100',
            'tipo_documento' => 'required|max:50',
            'historia' => 'required',
            'pnombre',
            'snombre',
            'papellido',
            'sapellido',
            'futuro2', // Este campo es la fecha de nacimiento del paciente
            'usuario_id' => 'required',
            'tipo_solicitud' => 'required',
            'cups_id',
            'contrato_id',
            'servicio_id'

        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $fechahoracita = $request->fechahora_cita . ":00";

        $citaasignada = DB::table('cita')->where(
            [
                ['fechahora_cita', '=', $fechahoracita], ['usuario_id', '=', $request->usuario_id]
            ]
        )->count();

        if ($citaasignada > 0) {
            return response()->json(['success' => 'tomada']);
        } else {

            // Obtener el nombre del servicio, el codigo cups y nombre del contrato

            /* $servicio = Servicios::find($request->servicio_id)->nombre; */
            $servicio = DB::table('servicios')->where('id_servicio', $request->servicio_id)->value('nombre');
            $fact_procedimiento = DB::table('def__procedimientos')->where('id_cups', $request->cups_id)->value('cod_cups');
            $contrato = DB::table('def__contratos')->where('id_contrato', $request->contrato_id)->value('nombre');
            $username = DB::table('usuario')->where('id', $request->usuario_id)->value('usuario');
            $paciente = DB::table('paciente')->where('documento', $request->historia)->value('id_paciente');


            DB::table('cita')
                ->where('id_cita', $id)
                ->update([
                    'fechahora_solicitada' => $request->fechahora_solicitada,
                    'fechahora_solicitud' => $request->fechahora_solicitud,
                    'ips' => $request->ips,
                    'tipo_documento' => $request->tipo_documento,
                    'historia' => $request->historia,
                    'pnombre' => $request->pnombre,
                    'snombre' => $request->snombre,
                    'papellido' => $request->papellido,
                    'sapellido' => $request->sapellido,
                    'futuro2' => $request->futuro2,
                    'usuario_id' => $request->usuario_id,
                    'usuario' => $username,
                    'estado' => 'ASIGNADA',
                    'tipo_solicitud' => $request->tipo_solicitud,
                    'servicio_id' => $request->servicio_id,
                    'servicio' => $servicio, // Actualizar el campo servicio con el nombre del servicio correspondiente
                    'cups_id' => $request->cups_id,
                    'cod_cups' => $fact_procedimiento,
                    'contrato_id' => $request->contrato_id,
                    'contrato' => $contrato,
                    'paciente_id' => $paciente,
                    'updated_at' => now()
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
