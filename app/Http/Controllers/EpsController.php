<?php

namespace App\Http\Controllers;

use App\Models\Admin\Eps_empresa;
use App\Models\Admin\Eps_copago;
use App\Models\Admin\Eps_niveles;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;

class EpsController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuario_id = $request->session()->get('usuario_id');

        if ($request->ajax()) {

            $datas = Eps_empresa::orderBy('id_eps_empresas')->get();

            return  DataTables()->of($datas)
                ->addColumn('action', function ($datas) {
                    $button = '<button type="button" name="edit" id="' . $datas->id_eps_empresas . '"
        class = "edit btn-float  bg-gradient-primary btn-sm tooltipsC"  title="Editar EPS"><i class="fas fa-clinic-medical"></i></button>'
                        . '<button type="button" name="edit" id="' . $datas->id_eps_empresas . '"
        class = "agregarnivel btn-float  bg-gradient-primary btn-sm tooltipsC"  title="Agregar Nivel"><i class="far fa-calendar-plus"></i></button>';

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.eps_empresa.index');
    }

    public function indexnivel($id)
    {
        

        if (request()->ajax()) {

            $datas2 = Eps_niveles::where('eps_empresas_id', $id)->get();

            return response()->json(['result' => $datas2]);
        }
        return view('admin.eps_empresa.index');
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function guardar(Request $request)
    {
        $rules = array(
            'codigo'  => 'required|max:10',
            'nombre'  => 'required|max:1000',
            'NIT' => 'numeric|required|min:10|max:9999999999',
            'color' => 'required',
            'estado'  => 'required'

        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {

            return response()->json(['errors' => $error->errors()->all()]);
        }

        Eps_empresa::create($request->all());
        return response()->json(['success' => 'ok']);
    }

    public function guardarnivel(Request $request)
    {

        if ($request->ajax()) {

            $rules = array(
                'codigo_empresa' => 'required',
                'eps_empresas_id' => 'required',
                'nivel' => 'required|max:10',
                'descripcion_nivel' => 'required|min:4|max:45',
                'regimen' => 'required|max:20',
                'tipo_recuperacion' => 'required|max:20',
                'afiliacion' => '',
                'servicios' => 'required',
                'vlr_copago' => 'numeric|required',
                'estado'  => 'required'

            );

            $error = Validator::make($request->all(), $rules);

            if ($error->fails()) {

                return response()->json(['errors' => $error->errors()->all()]);
            }

            Eps_niveles::create($request->all());
            return response()->json(['success' => 'okn1']);
        }
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

            $data = Eps_empresa::where('id_eps_empresas', $id)->first();

            return response()->json(['result' => $data]);
        }
        return view('admin.eps_empresa.index');
    }

    public function editarn($id)
    {
        if (request()->ajax()) {

            $datas2 = Eps_empresa::where('id_eps_empresas', $id)->first();

            return response()->json(['result' => $datas2]);
        }
        return view('admin.eps_empresa.index');
    }

    /* public function agregar_nivel(Request $request, $id)
    {
        if(request()->ajax()){

            $data = Eps_empresa::where('id_eps_empresas', $id)->first();

                return response()->json(['result'=>$data]);

            }
            return view('admin.eps_empresa.index'); 

        if ($request->ajax()) {
            $datas1 = DB::table('eps_niveles')
                ->Join('eps_empresas', 'eps_niveles.eps_empresas_id', '=', 'eps_empresas.id_eps_empresas')
                ->where('eps_niveles.id_eps_niveles', '=', $id)
                ->get();


            return response()->json(['result' => $datas1]);
        }
        return view('admin.eps_empresa.index');
    } */

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
            'codigo'  => 'required|max:10',
            'nombre'  => 'required|max:1000',
            'NIT' => 'numeric|required|min:10|max:9999999999',
            'color' => 'required',
            'estado'  => 'required'

        );


        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $data = DB::table('eps_empresas')->where('id_eps_empresas', '=', $id)
            ->update([
                'codigo' => $request->codigo,
                'nombre' => $request->nombre,
                'NIT' => $request->NIT,
                'color' => $request->color,
                'estado'  => $request->estado,
                'updated_at' => now()

            ]);
        // $data->update($request->all());
        return response()->json(['success' => 'ok1']);
    }

    public function actualizarnivel(Request $request, $id)
    {
        $rules = array(
            //'codigo_empresa' => 'required',
            //'eps_empresas_id' => 'required',
            'nivel' => 'required|max:10',
            'descripcion_nivel' => 'required|min:4|max:45',
            'regimen' => 'required|max:20',
            'tipo_recuperacion' => 'required|max:20',
            'afiliacion' => 'required|max:255',
            'servicios' => 'required',
            'vlr_copago' => 'numeric|required',
            'estado'  => 'required'

        );


        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $data = DB::table('eps_niveles')->where('id_eps_niveles', '=', $id)
            ->update([
                'nivel' => $request->nivel,
                'descripcion_nivel' => $request->nombre,
                'regimen' => $request->regimen,
                'tipo_recuperacion' => $request->tipo_recuperacion,
                'afiliacion' => $request->afiliacion,
                'servicios' => $request->servicios,
                'vlr_copago' => $request->vlr_copago,
                'estado' => $request->estado,
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
