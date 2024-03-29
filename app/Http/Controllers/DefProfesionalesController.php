<?php

namespace App\Http\Controllers;

use App\Models\Seguridad\Usuario;

use App\Models\Admin\Def_Especialidades;
use App\Models\Admin\Def_Profesionales;
use App\Models\Admin\rel__profesionalvsprocedimientos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;

class DefProfesionalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {


            $datas = Def_Profesionales::orderBy('id_profesional', 'asc')
                ->Join('def__especialidades', 'def__profesionales.especialidad_id', '=', 'def__especialidades.id_especialidad')
                ->select('def__profesionales.*', 'def__profesionales.nombre as nombre_profesional', 'def__especialidades.nombre as nombre_especialidad')
                ->get();

            return  DataTables()->of($datas)
                ->addColumn('action', function ($datas) {
                    $button = '<button type="button" name="Detalle" id="' . $datas->id_profesional . '" class="listasDetalleAll btn btn-app bg-success tooltipsC" title="Relacionar Item"  ><span class="badge bg-teal">Detalle</span><i class="fas fa-list-ul"></i>Relaciones</button>';

                    return $button;
                })->addColumn('estado', function ($datas) {


                    if ($datas->estado == "1") {

                        $button = '
                 <div class="custom-control custom-switch ">
                 <input type="checkbox"  class="check_98 custom-control-input"  id="customSwitch99' . $datas->id_profesional . '" value="' . $datas->id_profesional . '"  checked>
                 <label class="custom-control-label" for="customSwitch99' . $datas->id_profesional . '"  valueid="' . $datas->id_profesional . '"></label>
                 </div>';
                    } else {

                        $button = '
                 <div class="custom-control custom-switch ">
                 <input type="checkbox" class="check_98 custom-control-input" id="customSwitch99' . $datas->id_profesional . '" value="' . $datas->id_profesional . '" >
                 <label class="custom-control-label" for="customSwitch99' . $datas->id_profesional . '"  valueid="' . $datas->id_profesional . '"></label>
                 </div>';
                    }

                    return $button;
                })
                ->rawColumns(['action', 'estado'])
                ->make(true);
        }

        return view('admin.financiero.profesionales.index');
    }

    public function rel_index(Request $request)
    {

        if ($request->ajax()) {

            $datas = Def_Profesionales::orderBy('id_profesional', 'asc')
                ->Join('def__especialidades', 'def__profesionales.especialidad_id', '=', 'def__especialidades.id_especialidad')
                ->select('def__profesionales.*', 'def__profesionales.nombre as nombre_profesional', 'def__especialidades.nombre as nombre_especialidad')
                ->get();

            return  DataTables()->of($datas)
                ->addColumn('checkbox', function ($datas) {

                    $checkbox =  '<input type="checkbox" name="case[]" value="' . $datas->id_profesional . '" class="case" title="Selecciona Orden"/>';

                    return $checkbox;
                })
                ->rawColumns(['checkbox'])
                ->make(true);
        }

        return view('admin.financiero.procedimientos.index');
    }

    public function rel_med_index(Request $request)
    {

        if ($request->ajax()) {

            $datas = Def_Profesionales::orderBy('id_profesional', 'asc')
                ->Join('def__especialidades', 'def__profesionales.especialidad_id', '=', 'def__especialidades.id_especialidad')
                ->select('def__profesionales.*', 'def__profesionales.nombre as nombre_profesional', 'def__especialidades.nombre as nombre_especialidad')
                ->get();

            return  DataTables()->of($datas)
                ->addColumn('checkbox', function ($datas) {

                    $checkbox =  '<input type="checkbox" name="case[]" value="' . $datas->id_profesional . '" class="case" title="Selecciona Orden"/>';

                    return $checkbox;
                })
                ->rawColumns(['checkbox'])
                ->make(true);
        }

        return view('admin.financiero.medicamentos.index');
    }

    public function guardar(Request $request)
    {

        if ($request->ajax()) {

            $usuario_id = $request->session()->get('usuario_id');

            $rules = array(
                'codigo' => 'required',
                'nombre' => 'required',
                'reg_profesional' => 'required',
                'usuario_id' => 'required',
                'tipo' => 'required',
                'especialidad_id' => 'required',
                'fecha_inicio',
                'fecha_fin',
                'min_citas_lunes',
                'min_citas_martes',
                'min_citas_miercoles',
                'min_citas_jueves',
                'min_citas_viernes',
                'min_citas_sabado',
                'min_citas_domingo',
                'estado'

            );

            $error = Validator::make($request->all(), $rules);

            if ($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            Def_Profesionales::create($request->all());

            return response()->json(['success' => 'ok']);
        }
    }
    /**
     * Display the specified resource.
     *@param  int  $id
     * @param  \App\Models\Admin\Def_Profesionales  $def_Profesionales
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {

        if (request()->ajax()) {

            $data = Def_Profesionales::where('id_profesional', $id)->first();

            return response()->json(['result' => $data]);
        }
        return view('admin.financiero.profesionales.index');
    }

    public function updateestado(Request $request)
    {

        if ($request->ajax()) {

            //$procedimientoestado = new Def_Profesionales();


            $datas = DB::table('def__profesionales')->select('estado')->where('id_profesional', $request->input('id'))->first();

            //dd($datas);
            //return($datas);

            foreach ($datas as $data) {

                if ($data == '1') {

                    DB::table('def__profesionales')
                        ->where('id_profesional', $request->input('id'))
                        ->update([
                            'estado' => '0'
                        ]);

                    return response()->json(['respuesta' => 'Profesional desactivado', 'titulo' => 'Sistema Historias Clínicas', 'icon' => 'warning']);
                } else if ($data == '0') {
                    DB::table('def__profesionales')
                        ->where('id_profesional', $request->input('id'))
                        ->update([
                            'estado' => '1'
                        ]);

                    return response()->json(['respuesta' => 'Profesional habilitado correctamente', 'titulo' => 'Sistema Historias Clínicas', 'icon' => 'warning']);
                }
            }
        }
    }

    //Funcion para seleccionar la Especialidad desde la tabla def__especialidades
    public function selectespe(Request $request)
    {
        $ocupacionp = [];

        if ($request->has('q')) {

            $term = $request->get('q');
            $ocupacionp = Def_Especialidades::orderBy('id_especialidad')
                //   ->orwhere('nombre', 'LIKE', '%'.$term .'%')
                ->where('nombre', 'LIKE', '%' . $term . '%')
                ->get();
            return response()->json($ocupacionp);
        } else {
            $term = $request->get('q');
            $ocupacionp = Def_Especialidades::orderBy('id_especialidad')->get();
            return response()->json($ocupacionp);
        }
    }

    //Funcion para seleccionar el Usuario desde la usuario
    public function selectuser(Request $request)
    {
        $user = [];

        if ($request->has('q')) {

            $term = $request->get('q');
            $user = Usuario::orderBy('id')
                ->where('usuario', 'LIKE', '%' . $term . '%')
                // ->orwhere('usuario', 'LIKE', '%' . $term . '%')
                ->get();
            return response()->json($user);
        } else {
            $term = $request->get('q');
            $user = Usuario::orderBy('id')->get();
            return response()->json($user);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Admin\Def_Profesionales  $def_Profesionales
     * @return \Illuminate\Http\Response
     */
    public function show(Def_Profesionales $def_Profesionales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Def_Profesionales  $def_Profesionales
     * @return \Illuminate\Http\Response
     */
    public function edit(Def_Profesionales $def_Profesionales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Def_Profesionales  $def_Profesionales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Def_Profesionales $def_Profesionales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Def_Profesionales  $def_Profesionales
     * @return \Illuminate\Http\Response
     */
    public function destroy(Def_Profesionales $def_Profesionales)
    {
        //
    }
}
