<?php

namespace App\Http\Controllers;

use App\Models\Admin\Departamentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DepartamentosController extends Controller
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
            $datas = Departamentos::orderBy('id_departamento')
                ->get();

            return  DataTables()->of($datas)
                ->addColumn('action', function ($datas) {
                    $button = '<button type="button" name="edit" id="' . $datas->id_departamento . '"
        class = "edit btn-float  bg-gradient-primary btn-sm tooltipsC"  title="Editar"><i class="far fa-edit"></i></button>';

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.parametros.departamentos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        $rules = array(
            'cod_departamento'  => 'required|max:10',
            'nombre'  => 'required|max:200',
            'estado'  => 'required'
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {

            return response()->json(['errors' => $error->errors()->all()]);
        }

        Departamentos::create($request->all());
        return response()->json(['success' => 'ok']);
    }

    public function editar($id)
    {
        if (request()->ajax()) {

            $data = Departamentos::where('id_departamento', $id)->first();

            return response()->json(['result' => $data]);
        }
        return view('admin.parametros.departamentos.index');
    }

    public function actualizar(Request $request, $id)
    {
        $rules = array(
            'cod_departamento'  => 'required|max:10',
            'nombre'  => 'required|max:200',
            'estado'  => 'required'
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $data = DB::table('departamentos')->where('id_departamento', '=', $id)
            ->update([
                'cod_departamento' => $request->cod_departamento,
                'nombre' => $request->nombre,
                'estado' => $request->estado,
                'updated_at' => now()
            ]);
        //$data->update($request->all());
        return response()->json(['success' => 'ok1']);
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Departamentos  $departamentos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departamentos $departamentos)
    {
        //
    }
}
