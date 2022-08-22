<?php

namespace App\Http\Controllers;

use App\Models\Admin\Ciudades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CiudadesController extends Controller
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
            $datas = Ciudades::orderBy('id_ciudad')
                ->get();

            return  DataTables()->of($datas)
                ->addColumn('action', function ($datas) {
                    $button = '<button type="button" name="edit" id="' . $datas->id_ciudad . '"
        class = "edit btn-float  bg-gradient-primary btn-sm tooltipsC"  title="Editar"><i class="far fa-edit"></i></button>';

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.parametros.ciudades.index');
    }

    public function guardar(Request $request)
    {
        $rules = array(
            'cod_ciudad'  => 'required|max:10',
            'nombre'  => 'required|max:200',
            'estado'  => 'required'
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {

            return response()->json(['errors' => $error->errors()->all()]);
        }

        Ciudades::create($request->all());
        return response()->json(['success' => 'ok']);
    }

    public function editar($id)
    {
        if (request()->ajax()) {

            $data = Ciudades::where('id_ciudad', $id)->first();

            return response()->json(['result' => $data]);
        }
        return view('admin.parametros.ciudades.index');
    }

    public function actualizar(Request $request, $id)
    {
        $rules = array(
            'cod_ciudad'  => 'required|max:10',
            'nombre'  => 'required|max:200',
            'estado'  => 'required'
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $data = DB::table('ciudades')->where('id_ciudad', '=', $id)
            ->update([
                'cod_ciudad' => $request->cod_ciudad,
                'nombre' => $request->nombre,
                'estado' => $request->estado,
                'updated_at' => now()
            ]);
        
        return response()->json(['success' => 'ok1']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Ciudades  $ciudades
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ciudades $ciudades)
    {
        //
    }
}
