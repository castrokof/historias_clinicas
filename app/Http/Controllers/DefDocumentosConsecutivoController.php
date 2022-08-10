<?php

namespace App\Http\Controllers;

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
                    $button = '<button type="button" name="edit" id="' . $datas->id_documento_consecutivo . '"
                    class = "edit btn-float  bg-gradient-primary btn-sm tooltipsC"  title="Editar"><i class="far fa-edit"></i></button>';

                    return $button;
                })->addColumn('estado', function ($datas) {


                    if ($datas->estado == "1") {

                        $button = '
                 <div class="custom-control custom-switch ">
                 <input type="checkbox"  class="check_98 custom-control-input"  id="customSwitch99' . $datas->id_documento_consecutivo . '" value="' . $datas->id_documento_consecutivo . '"  checked>
                 <label class="custom-control-label" for="customSwitch99' . $datas->id_documento_consecutivo . '"  valueid="' . $datas->id_documento_consecutivo . '"></label>
                 </div>';
                    } else {

                        $button = '
                 <div class="custom-control custom-switch ">
                 <input type="checkbox" class="check_98 custom-control-input" id="customSwitch99' . $datas->id_documento_consecutivo . '" value="' . $datas->id_documento_consecutivo . '" >
                 <label class="custom-control-label" for="customSwitch99' . $datas->id_documento_consecutivo . '"  valueid="' . $datas->id_documento_consecutivo . '"></label>
                 </div>';
                    }

                    return $button;
                })
                ->rawColumns(['action', 'estado'])
                ->make(true);
        }

        return view('admin.financiero.docu_consecutivo.index');
    }

    public function index_2(Request $request) // Este index es de prueba
    {
        $usuario_id = $request->session()->get('usuario_id');
        $idlist = $request->id;

        if ($request->ajax()) {
            //$idlist = def__documentos_consecutivo::orderBy('id_documento_consecutivo', 'asc')->get();

            $datast = DB::table('def__documentos_consecutivos')
                ->Join('def__documentos', 'def__documentos_consecutivos.documento_id', '=', 'def__documentos.id_documento')
                ->select(
                    'def__documentos_consecutivos.id_documento_consecutivo as idd',
                    'def__documentos.cod_documentos as codigo',
                    'def__documentos.nombre as nombre',
                    'def__documentos_consecutivos.consecutivo as consecutivo',
                    'def__documentos_consecutivos.sede as sede'
                )
                ->where('def__documentos_consecutivos.id_documento_consecutivo', '=', $idlist)
                ->get();


            return  DataTables()->of($datast)
                ->addColumn('action', function ($datast) {
                    $button = '<button type="button" name="eliminarpp" id="' . $datast->idd . '" 
        class = "eliminarpp btn-float  bg-gradient-danger btn-sm tooltipsC"  title="Eliminar Relacion"><i class=""><i class="fa fa-trash"></i></i></a>';

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
