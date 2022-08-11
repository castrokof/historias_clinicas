<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Models\Admin\def__documentos_consecutivo;
use App\Models\Admin\Def_Documentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;

class DefDocumentosConsecutivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {


            $datas = def__documentos_consecutivo::orderBy('id_documento_consecutivo', 'asc')
                ->Join('def__documentos', 'def__documentos_consecutivos.documento_id', '=', 'def__documentos.id_documento')
                ->select(
                    'def__documentos_consecutivos.id_documento_consecutivo as idd',
                    'def__documentos.cod_documentos as codigo',
                    'def__documentos.nombre as nombre',
                    'def__documentos_consecutivos.consecutivo as consecutivo',
                    'def__documentos_consecutivos.sede as sede'
                )
                //->where('def__documentos_consecutivos.id_documento_consecutivo', '=', $idlist)
                ->get();

            return  DataTables()->of($datas)
                ->addColumn('action', function ($datas) {
                    $button = '<button type="button" name="edit" id="' . $datas->idd . '"
                    class = "edit btn-float  bg-gradient-primary btn-sm tooltipsC"  title="Editar"><i class="far fa-edit"></i></button>';

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.financiero.docu_consecutivo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {

        if ($request->ajax()) {

            $usuario_id = $request->session()->get('usuario_id');

            $rules = array(
                'documento_id' => 'required',
                'consecutivo' => 'required',
                'sede',
                'observaciones'
            );

            $error = Validator::make($request->all(), $rules);

            if ($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            def__documentos_consecutivo::create($request->all());

            return response()->json(['success' => 'ok']);
        }
    }

    //Funcion para seleccionar el Documento desde la tabla def__documentos
    public function selectdoc(Request $request)
    {
        $docuc = [];

        if ($request->has('q')) {

            $term = $request->get('q');
            $docuc = Def_Documentos::orderBy('id_documento')
                ->where('cod_documentos', 'LIKE', '%' . $term . '%')
                ->orwhere('nombre', 'LIKE', '%' . $term . '%')
                ->get();
            return response()->json($docuc);
        }
    }

    public function buscarp(Request $request)
    {
        $usuario_id = $request->session()->get('usuario_id');
        $fechaActual= Carbon::now()->toDateString()." 00:00:01";

        $paises = Def_Documentos::orderBy('id_documento')->select('id_documento', 'cod_documentos', 'consecutivo')->get();

        if (request()->ajax()) {

            /* $data = Paciente::where('documento', $request->document)->first(); */
            $data = DB::table('paciente') 
            ->Join('paises','paciente.pais_id','=','paises.id_documento')
            /* ->select(DB::raw('paises.nombre as pais'),'paciente.documento as documento',) */
            ->where('paciente.documento', $request->document)
            ->first();

            return response()->json(['pacientes' => $data]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        if (request()->ajax()) {

            $data = def__documentos_consecutivo::where('id_documento_consecutivo', $id)->first();

            return response()->json(['result' => $data]);
        }
        return view('admin.financiero.docu_consecutivo.index');
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
     * @param  \App\Models\Admin\def__documentos_consecutivo  $def__documentos_consecutivo
     * @return \Illuminate\Http\Response
     */
    public function show(def__documentos_consecutivo $def__documentos_consecutivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\def__documentos_consecutivo  $def__documentos_consecutivo
     * @return \Illuminate\Http\Response
     */
    public function edit(def__documentos_consecutivo $def__documentos_consecutivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\def__documentos_consecutivo  $def__documentos_consecutivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, def__documentos_consecutivo $def__documentos_consecutivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\def__documentos_consecutivo  $def__documentos_consecutivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(def__documentos_consecutivo $def__documentos_consecutivo)
    {
        //
    }
}
