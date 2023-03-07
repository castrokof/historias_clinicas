<?php

namespace App\Http\Controllers;

use App\Models\Admin\Barrios;
use App\Models\Admin\Eps_empresa;
use App\Models\Admin\Paciente;
use App\Models\Admin\Ocupaciones;
use App\Models\Admin\Paises;
use App\Models\Admin\Departamentos;
use App\Models\Admin\Ciudades;
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
        $idlist = $request->id;

        if ($request->ajax()) {
            $datas = DB::table('paciente')
                ->Join('ocupaciones', 'paciente.ocupacion_id', '=', 'ocupaciones.id_ocupacion')
                ->Join('eps_empresas', 'paciente.eps_id', '=', 'eps_empresas.id_eps_empresas')
                ->Join('paises', 'paciente.pais_id', '=', 'paises.id_pais')
                ->Join('ciudades', 'paciente.ciudad_id', '=', 'ciudades.id_ciudad')
                ->select('*',
                    'paciente.id_paciente as idd',
                    'ocupaciones.codigo as cod_ocu',
                    'ocupaciones.nombre as nombre_ocu',
                    'eps_empresas.codigo as codigo_eps',
                    'eps_empresas.nombre as eps_nombre',
                    'paises.cod_pais as cod_pais',
                    'paises.nombre as nombre_pais',
                    'ciudades.cod_ciudad as cod_ciudad',
                    'ciudades.nombre as nombre_ciudad'
                )
                // ->where('paciente.id_paciente', '=', $idlist)
                // ->orderBy('id_paciente')
                ->get();


            return  DataTables()->of($datas)
                ->addColumn('action', function ($datas) {
                    $button = '<button type="button" name="edit" id="' . $datas->idd . '"
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
            'ocupacion_id' => 'required',
            'eps_id' => 'required',
            'regimen',
            'afiliacion',
            'nivel',
            'futuro2', //Este dato es la fecha de nacimiento del paciente
            'Poblacion_especial' => 'required',
            'pais_id' => 'required',
            'departamento_id' => 'required',
            'ciudad_id' => 'required',
            'barrio_id' => 'required',
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
            'celular' => 'numeric|required|min:50|max:9999999999',
            'tipo_documento' => 'required',
            'documento' => 'numeric|required|min:19|max:9999999999',
            'ocupacion_id' => 'required',
            'eps_id' => 'required',
            'regimen',
            'afiliacion',
            'nivel',
            'futuro2', //Este dato es la fecha de nacimiento del paciente
            'Poblacion_especial' => 'required',
            'pais_id' => 'required',
            'departamento_id' => 'required',
            'ciudad_id' => 'required',
            'barrio_id' => 'required',
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
                'ocupacion_id' => $request->ocupacion_id,
                'eps_id' => $request->eps_id,
                'edad' => $request->edad,
                'sexo' => $request->sexo,
                'orientacion_sexual' => $request->orientacion_sexual,
                'pais_id' => $request->pais_id,
                'departamento_id' => $request->departamento_id,
                'direccion' => $request->direccion,
                'celular' => $request->celular,
                'telefono' => $request->telefono,
                'regimen' => $request->regimen,
                'nivel' => $request->nivel,
                'futuro2' => $request->futuro2, // Este campo corresponde a la fecha de nacimiento del paciente
                'Poblacion_especial' => $request->Poblacion_especial,
                'ciudad_id' => $request->ciudad_id,
                'barrio_id' => $request->barrio_id,
                'operador' => $request->operador,
                'correo' => $request->correo,
                'observaciones' => $request->observaciones,
                'updated_at' => now()

            ]);
        // $data->update($request->all());
        return response()->json(['success' => 'ok1']);
    }

    //Funcion para seleccionar el País desde la tabla paises
    public function selectocu(Request $request)
    {
        $ocupacionp = [];

        if ($request->has('q')) {

            $term = $request->get('q');
            $ocupacionp = Ocupaciones::orderBy('id_ocupacion')
                //   ->orwhere('nombre', 'LIKE', '%'.$term .'%')
                ->where('nombre', 'LIKE', '%' . $term . '%')
                ->get();
            return response()->json($ocupacionp);
        } else {
            $term = $request->get('q');
            $ocupacionp = Ocupaciones::orderBy('id_ocupacion')->get();
            return response()->json($ocupacionp);
        }
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
        } else {
            $term = $request->get('q');
            $paisp = Paises::orderBy('id_pais')->get();
            return response()->json($paisp);
        }
    }

    //Funcion para seleccionar la EPS desde la tabla eps_empresas
    public function selecteps(Request $request)
    {
        $epsp = [];

        if ($request->has('q')) {

            $term = $request->get('q');
            $epsp = Eps_empresa::orderBy('id_eps_empresas')
                ->where('codigo', 'LIKE', '%' . $term . '%')
                //   ->orwhere('nombre', 'LIKE', '%'.$term .'%')
                ->get();
            return response()->json($epsp);
        } else {
            $term = $request->get('q');
            $epsp = Eps_empresa::orderBy('id_eps_empresas')->get();
            return response()->json($epsp);
        }
    }

    //Funcion para seleccionar el Departamento desde la tabla departamentos
    public function selectde(Request $request)
    {
        $departamentop = [];

        if ($request->has('q')) {

            $term = $request->get('q');
            $departamentop = Departamentos::orderBy('id_departamento')
                //   ->orwhere('nombre', 'LIKE', '%'.$term .'%')
                ->where('nombre', 'LIKE', '%' . $term . '%')
                ->get();
            return response()->json($departamentop);
        } else {
            $term = $request->get('q');
            $departamentop = Departamentos::orderBy('id_departamento')->get();
            return response()->json($departamentop);
        }
    }

    //Funcion para seleccionar el Ciudad desde la tabla ciudades
    public function selectci(Request $request)
    {
        $ciudadp = [];

        if ($request->has('q')) {

            $term = $request->get('q');
            $ciudadp = Ciudades::orderBy('id_ciudad')
                //   ->orwhere('nombre', 'LIKE', '%'.$term .'%')
                ->where('nombre', 'LIKE', '%' . $term . '%')
                ->get();
            return response()->json($ciudadp);
        } else {
            $term = $request->get('q');
            $ciudadp = Ciudades::orderBy('id_ciudad')->get();
            return response()->json($ciudadp);
        }
    }

    //Funcion para seleccionar el Barrio desde la tabla barrios
    public function selectbar(Request $request)
    {
        $ciudadp = [];

        if ($request->has('q')) {

            $term = $request->get('q');
            $ciudadp = Barrios::orderBy('id_barrio')
                //   ->orwhere('nombre', 'LIKE', '%'.$term .'%')
                ->where('nombre', 'LIKE', '%' . $term . '%')
                ->get();
            return response()->json($ciudadp);
        } else {
            $term = $request->get('q');
            $ciudadp = Barrios::orderBy('id_barrio')->get();
            return response()->json($ciudadp);
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
