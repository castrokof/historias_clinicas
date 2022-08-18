<?php

namespace App\Http\Controllers;

use App\Models\Admin\def__documentos_consecutivo;
use Carbon\Carbon;

use App\Models\Admin\Eps_empresa;
use App\Models\Admin\Eps_copago;
use App\Models\Admin\Eps_niveles;
use App\Models\Admin\Paciente;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Factura;
use App\Models\Admin\Fc_Factura_Procedimientos;
use App\Models\Admin\Paises;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $usuario_id = $request->session()->get('usuario_id');
        $documento_consecutivo = DB::table('def__documentos_consecutivos')
        ->join('def__documentos', 'def__documentos.id_documento', '=', 'def__documentos_consecutivos.documento_id')
        ->where('def__documentos.cod_documentos', 'DS')
        ->select('def__documentos_consecutivos.consecutivo', 'def__documentos.cod_documentos')
        ->get();


              return view('admin.financiero.facturacion.index', compact('documento_consecutivo'));
    }


    public function indexGuardarFactura(Request $request)
    {
        //
        $usuario_id = $request->session()->get('usuario_id');

        if ($request->ajax()) {


            $cuenta_conse = DB::table('def__documentos_consecutivos')
            ->join('def__documentos', 'def__documentos.id_documento', '=', 'def__documentos_consecutivos.documento_id')
            ->where([['def__documentos.cod_documentos', $request->consecutivo],
            ['def__documentos.cod_documentos', $request->cod_documentos]
                    ])
            ->count();

            if ($cuenta_conse == 0) {
                Fc_Factura_Procedimientos::create($request->all());
                // def__documentos_consecutivos::update(
                //     'consecutivo' -> $request->consecutivo + 1
                // );
            }



            $documento_consecutivo = DB::table('def__documentos_consecutivos')
            ->join('def__documentos', 'def__documentos.id_documento', '=', 'def__documentos_consecutivos.documento_id')
            ->where('def__documentos.cod_documentos', 'DS')
            ->select('def__documentos_consecutivos.consecutivo', 'def__documentos.cod_documentos')
            ->get();

            return response()->json([$documento_consecutivo,'ok']);

        }


              return view('admin.financiero.facturacion.index', compact('documento_consecutivo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectpa(Request $request)
    {

        $pacientes1 = [];

        if ($request->has('q')) {

            $term = $request->get('q');
            $pacientes1 = Paciente::orderBy('id_paciente')
                //->where([['documento', '=', $term->documento]])
                ->where('pnombre', 'LIKE', '%' . $term . '%')
                ->orwhere('papellido', 'LIKE', '%' . $term . '%')
                ->orwhere('documento', 'LIKE', '%' . $term . '%')
                ->get();
            return response()->json($pacientes1);
        }
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
     * @param  \App\Models\Admin\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show(Factura $factura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        if (request()->ajax()) {

            $data = Paciente::where('id_paciente', $id)->first();

            return response()->json(['result' => $data]);
        }
        return view('admin.paciente.index');
    }


    public function buscarp(Request $request)
    {
        $usuario_id = $request->session()->get('usuario_id');
        $fechaActual= Carbon::now()->toDateString()." 00:00:01";

        $paises = Paises::orderBy('id_pais')->select('id_pais', 'cod_pais', 'nombre',DB::raw("nombre as pais"))->get();

        if (request()->ajax()) {

            /* $data = Paciente::where('documento', $request->document)->first(); */
            $data = DB::table('paciente')
            ->Join('paises','paciente.pais_id','=','paises.id_pais')
            /* ->select(DB::raw('paises.nombre as pais'),'paciente.documento as documento',) */
            ->where('paciente.documento', $request->document)
            ->first();

            return response()->json(['pacientes' => $data]);
        }

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Factura $factura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Factura $factura)
    {
        //
    }
}
