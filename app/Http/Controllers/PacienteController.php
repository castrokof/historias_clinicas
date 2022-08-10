<?php

namespace App\Http\Controllers;

use App\Models\Admin\Eps_empresa;
use App\Models\Admin\Paciente;
use App\Models\Admin\Paises;
use App\Models\Seguridad\Usuario;
//use App\Models\Admin\Eps_niveles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuario_id = $request->session()->get('usuario_id');
        if ($request->ajax()) {
            $datas = Paciente::orderBy('id_paciente')
                ->get();


            return  DataTables()->of($datas)
                ->addColumn('action', function ($datas) {
                    $button = '<button type="button" name="edit" id="' . $datas->id_paciente . '"
        class = "edit btn-float  bg-gradient-primary btn-sm tooltipsC"  title="Editar paciente"><i class="far fa-edit"></i></button>';

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.paciente.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function guardar(Request $request)
    {
        $rules = array(
            'pnombre'  => 'required|max:100',
            'papellido'  => 'required|max:100',
            'tipo_documento' => 'required',
            'documento' => 'numeric|required|min:19|max:9999999999',
            'celular' => 'numeric|required|min:50|max:9999999999',
            'Ocupacion' => 'required',
            'eps' => 'required',
            'Poblacion_especial' => 'required',
            'pais_id' => 'required',
            'ciudad' => 'required',
            'direccion' => 'required',
            'sexo' => 'required',
            'orientacion_sexual' => 'required',
            'usuario_id'

        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {

            return response()->json(['errors' => $error->errors()->all()]);
        }

        Paciente::create($request->all());
        return response()->json(['success' => 'ok']);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

            $data = Paciente::where('id_paciente', $id)->first();

            return response()->json(['result' => $data]);
        }
        return view('admin.paciente.index');
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
            'pnombre'  => 'required|max:100',
            'papellido'  => 'required|max:100',
            'documento' => 'numeric|required|min:19|max:9999999999',
            'celular' => 'numeric|required|min:50|max:9999999999',
            'tipo_documento' => 'required',
            'Ocupacion' => 'required',
            'eps' => 'required',
            'Poblacion_especial' => 'required',
            'pais_id' => 'required',
            'ciudad' => 'required',
            'direccion' => 'required',
            'sexo' => 'required',
            'orientacion_sexual' => 'required',
            'usuario_id'
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $data = DB::table('paciente')->where('id_paciente', '=', $id)
            ->update([
                'papellido' => $request->papellido,
                'sapellido' => $request->sapellido,
                'pnombre' => $request->pnombre,
                'snombre' => $request->snombre,
                'tipo_documento' => $request->tipo_documento,
                'documento' => $request->documento,
                'edad' => $request->edad,
                'sexo' => $request->sexo,
                'pais_id' => $request->pais_id,
                'futuro3' => $request->futuro3,
                'direccion' => $request->direccion,
                'celular' => $request->celular,
                'telefono' => $request->telefono,
                'plan' => $request->plan,
                'Ocupacion' => $request->Ocupacion,
                'Poblacion_especial' => $request->Poblacion_especial,
                'ciudad' => $request->ciudad,
                'operador' => $request->operador,
                'correo' => $request->correo,
                'observaciones' => $request->observaciones,
                'updated_at' => now()

            ]);
        // $data->update($request->all());
        return response()->json(['success' => 'ok1']);
    }

    //Funcion para seleccionar el País desde la tabla paises
    public function selectpa(Request $request)
    {
        $paisp = [];

        if ($request->has('q')) {

            $term = $request->get('q');
            $paisp = Paises::orderBy('id_pais')
                //   ->orwhere('nombre', 'LIKE', '%'.$term .'%')
                ->where('nombre', 'LIKE', '%' . $term . '%')
                ->get();
            return response()->json($paisp);
        }
    }

    //Funcion para seleccionar la EPS desde la tabla eps_empresas
    public function selecteps(Request $request)
    {
        $paisp = [];

        if ($request->has('q')) {

            $term = $request->get('q');
            $paisp = Eps_empresa::orderBy('id_eps_empresas')                
                ->where('codigo', 'LIKE', '%' . $term . '%')
                //   ->orwhere('nombre', 'LIKE', '%'.$term .'%')                
                ->get();
            return response()->json($paisp);
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
