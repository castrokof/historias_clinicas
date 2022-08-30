<?php

namespace App\Http\Controllers;

use App\Models\Admin\def__finalidades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DefFinalidadesController extends Controller
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
            $datas = def__finalidades::orderBy('id_finalidad')
                ->get();

            return  DataTables()->of($datas)
                ->addColumn('action', function ($datas) {
                    $button = '<button type="button" name="edit" id="' . $datas->id_finalidad . '"
        class = "edit btn-float  bg-gradient-primary btn-sm tooltipsC"  title="Editar"><i class="far fa-edit"></i></button>';

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.parametros.finalidades.index');
    }

    public function guardar(Request $request)
    {
        $rules = array(
            'finalidad'  => 'required|max:20',
            'nombre'  => 'required|max:255',
            'regimen' => 'max:255',
            'eps_empresas_id' ,
            'servicio_id' ,
            'edad_min' ,
            'edad_max' ,
            'genero' ,
            'embarazo' 
            
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {

            return response()->json(['errors' => $error->errors()->all()]);
        }

        def__finalidades::create($request->all());
        return response()->json(['success' => 'ok']);
    }

    public function editar($id)
    {
        if (request()->ajax()) {

            $data = def__finalidades::where('id_finalidad', $id)->first();

            return response()->json(['result' => $data]);
        }
        return view('admin.parametros.finalidades.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, $id)
    {
        $rules = array(
            'finalidad'  => 'required|max:20',
            'nombre'  => 'required|max:255',
            'regimen' => 'max:255',
            'eps_empresas_id' ,
            'servicio_id' ,
            'edad_min' ,
            'edad_max' ,
            'genero' ,
            'embarazo'
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $data = DB::table('def__finalidades')->where('id_finalidad', '=', $id)
            ->update([
                'finalidad' => $request->finalidad,
                'nombre' => $request->nombre,
                'regimen' => $request->regimen,
                'eps_empresas_id' => $request->eps_empresas_id,
                'servicio_id' => $request->servicio_id,
                'edad_min' => $request->edad_min,
                'edad_max' => $request->edad_max,
                'genero' => $request->genero,
                'embarazo' => $request->embarazo,
                'updated_at' => now()
            ]);
        //$data->update($request->all());
        return response()->json(['success' => 'ok1']);
    }
}
