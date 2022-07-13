<?php

namespace App\Http\Controllers;

use App\Models\Admin\Paciente;
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



        if($request->ajax()){

        $datas = Paciente::orderBy('id_paciente')
        ->get();

        return  DataTables()->of($datas)
        ->addColumn('action', function($datas){
        $button = '<button type="button" name="edit" id="'.$datas->id_paciente.'"
        class = "edit btn-float  bg-gradient-primary btn-sm tooltipsC"  title="Editar usuario"><i class="far fa-edit"></i></button>';

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
            'documento' => 'numeric|required|min:10000|max:9999999999',
            'celular' => 'numeric|required|min:10000|max:9999999999',
            'tipo_documento' => 'required',
            'ciudad' => 'required',
            'direccion' => 'required',
            'sexo' => 'required'

        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails()) {

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
        if(request()->ajax()){

            $data = Paciente::where('id_paciente', $id)->first();

                return response()->json(['result'=>$data]);

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
            'documento' => 'numeric|required|min:10000|max:9999999999',
            'celular' => 'numeric|required|min:10000|max:9999999999',
            'tipo_documento' => 'required',
            'ciudad' => 'required',
            'sexo' => 'required',
            'direccion' => 'required',


        );


        $error = Validator::make($request->all(), $rules);

        if($error->fails()) {
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
            'direccion' => $request->direccion,
            'celular' => $request->celular,
            'telefono' => $request->telefono,
            'plan' => $request->plan,
            'ciudad' => $request->ciudad,
            'operador' => $request->operador,
            'correo' => $request->correo,
            'sexo' => $request->sexo,
            'observaciones' => $request->observaciones,
            'updated_at' => now()

          ]);
        // $data->update($request->all());
        return response()->json(['success' => 'ok1']);
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
