<?php

namespace App\Http\Controllers;

use App\Models\Admin\Def_ATC_Medicamentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DefATCMedicamentosController extends Controller
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
            $datas = Def_ATC_Medicamentos::orderBy('id_ATC')
                ->get();

            return  DataTables()->of($datas)
                ->addColumn('action', function ($datas) {
                    $button = '<button type="button" name="edit" id="' . $datas->id_ATC . '"
        class = "edit btn-float  bg-gradient-primary btn-sm tooltipsC"  title="Editar"><i class="far fa-edit"></i></button>';

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.parametros.codigos_atc.index');
    }

    public function guardar(Request $request)
    {
        $rules = array(
            'cod_atc'  => 'required|max:40',
            'nombre'  => 'required|max:255',
            'consecutivo_forma'  => 'required|max:10',
            'forma'  => 'required|max:255',
            'concentracion'  => 'required|max:255',
            'via_administracion'  => 'required|max:100'
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {

            return response()->json(['errors' => $error->errors()->all()]);
        }

        Def_ATC_Medicamentos::create($request->all());
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

            $data = Def_ATC_Medicamentos::where('id_ATC', $id)->first();

            return response()->json(['result' => $data]);
        }
        return view('admin.parametros.codigos_atc.index');
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
            'cod_atc'  => 'required|max:40',
            'nombre'  => 'required|max:255',
            'consecutivo_forma'  => 'required|max:10',
            'forma'  => 'required|max:255',
            'concentracion'  => 'required|max:255',
            'via_administracion'  => 'required|max:100'
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $data = DB::table('def__a_t_c__medicamentos')->where('id_ATC', '=', $id)
            ->update([
                'cod_atc' => $request->cod_atc,
                'nombre' => $request->nombre,
                'consecutivo_forma' => $request->consecutivo_forma,
                'forma' => $request->forma,
                'concentracion' => $request->concentracion,
                'via_administracion' => $request->via_administracion,
                'updated_at' => now()
            ]);
        //$data->update($request->all());
        return response()->json(['success' => 'ok1']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Def_ATC_Medicamentos  $def_ATC_Medicamentos
     * @return \Illuminate\Http\Response
     */
    
}
