<?php

namespace App\Http\Controllers;

use App\Models\Admin\Ocupaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OcupacionesController extends Controller
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
            $datas = Ocupaciones::orderBy('id_ocupacion')
                ->get();

            return  DataTables()->of($datas)
                ->addColumn('action', function ($datas) {
                    $button = '<button type="button" name="edit" id="' . $datas->id_ocupacion . '"
        class = "edit btn-float  bg-gradient-primary btn-sm tooltipsC"  title="Editar"><i class="far fa-edit"></i></button>';

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.parametros.ocupaciones.index');
    }

    public function guardar(Request $request)
    {
        $rules = array(
            'codigo'  => 'required|max:10',
            'nombre'  => 'required|max:250',
            'estado'  => 'required'
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {

            return response()->json(['errors' => $error->errors()->all()]);
        }

        Ocupaciones::create($request->all());
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

            $data = Ocupaciones::where('id_ocupacion', $id)->first();

            return response()->json(['result' => $data]);
        }
        return view('admin.parametros.ocupaciones.index');
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
            'codigo'  => 'required|max:10',
            'nombre'  => 'required|max:250',
            'estado'  => 'required'
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $data = DB::table('ocupaciones')->where('id_ocupacion', '=', $id)
            ->update([
                'codigo' => $request->codigo,
                'nombre' => $request->nombre,
                'estado' => $request->estado,
                'updated_at' => now()
            ]);
        //$data->update($request->all());
        return response()->json(['success' => 'ok1']);
    }

    
}
