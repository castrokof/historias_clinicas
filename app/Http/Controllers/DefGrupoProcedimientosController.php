<?php

namespace App\Http\Controllers;

use App\Models\Admin\def__grupo_procedimientos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DefGrupoProcedimientosController extends Controller
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
        if ($request->ajax()) {
            $datas = def__grupo_procedimientos::orderBy('id_grupo')
                ->get();

            return  DataTables()->of($datas)
                ->addColumn('action', function ($datas) {
                    $button = '<button type="button" name="edit" id="' . $datas->id_grupo . '"
        class = "edit btn-float  bg-gradient-primary btn-sm tooltipsC"  title="Editar"><i class="far fa-edit"></i></button>';

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.parametros.agrupaciones.index');
    }

    public function guardar(Request $request)
    {
        $rules = array(
            'codigo'  => 'required|max:20',
            'nombre_grupo'  => 'required|max:255'
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {

            return response()->json(['errors' => $error->errors()->all()]);
        }

        def__grupo_procedimientos::create($request->all());
        return response()->json(['success' => 'ok']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        if (request()->ajax()) {

            $data = def__grupo_procedimientos::where('id_grupo', $id)->first();

            return response()->json(['result' => $data]);
        }
        return view('admin.parametros.agrupaciones.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, $id)
    {
        $rules = array(
            'codigo'  => 'required|max:20',
            'nombre_grupo'  => 'required|max:255'
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $data = DB::table('def__grupo_procedimientos')->where('id_grupo', '=', $id)
            ->update([
                'codigo' => $request->codigo,
                'nombre_grupo' => $request->nombre_grupo,
                'updated_at' => now()
            ]);
        //$data->update($request->all());
        return response()->json(['success' => 'ok1']);
    }
}
