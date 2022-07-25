<?php

namespace App\Http\Controllers;

use App\Models\Admin\Def_Procedimientos;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;

class DefProcedimientosController extends Controller
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
            $datas = Def_Procedimientos::orderBy('id_cups')
                ->get();


            return  DataTables()->of($datas)
                ->addColumn('action', function ($datas) {
                    $button = '<button type="button" name="edit" id="' . $datas->id_cups . '"
        class = "edit btn-float  bg-gradient-primary btn-sm tooltipsC"  title="Editar procedimiento"><i class="far fa-edit"></i></button>';

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.financiero.procedimientos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {

        if ($request->ajax()) {

            $usuario_id = $request->session()->get('usuario_id');

            $rules = array(
                'cod_cups'=> 'required',
                'cod_alterno',
                'nombre'=> 'required',
                'grupo',
                'finalidad',
                'descripcion',
                'observacion',
                'genero',
                'edad_1',
                'edad_2',
                'cantidad_maxima',
                'valor_SOAT',
                'valor_particular',
                'estado'

            );

            $error = Validator::make($request->all(), $rules);

            if ($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            Def_Procedimientos::create($request->all());

            return response()->json(['success' => 'ok']);
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
     * @param  \App\Models\Def_Procedimientos  $def_Procedimientos
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        //
        $data = Def_Procedimientos::findOrFail($id);
        return response()->json(['result'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Def_Procedimientos  $def_Procedimientos
     * @return \Illuminate\Http\Response
     */
    public function edit(Def_Procedimientos $def_Procedimientos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Def_Procedimientos  $def_Procedimientos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Def_Procedimientos $def_Procedimientos)
    {
        //
    }

    public function updateestado(Request $request)
    {

            if ($request->ajax()) {

                $procedimientoactivo = new Def_Procedimientos();

                $datas = DB::table('def__procedimientos')->select('estado')->where('id_cups',$request->input('id_cups'))->first();

                foreach($datas as $data){

                  if($data == '1'){

                    $procedimientoactivo->findOrFail($request->input('id_cups'))->update([
                        'estado' =>'0'
                    ]);

                    return response()->json(['respuesta' => 'Procedimiento desactivado', 'titulo' => 'System Fidem', 'icon' => 'warning']);
                    }else if($data == '0'){
                        $procedimientoactivo->findOrFail($request->input('id_cups'))->update([
                            'estado' => '1'
                        ]);

                        return response()->json(['respuesta' => 'Procedimiento activado correctamente', 'titulo' => 'System Fidem', 'icon' => 'warning']);

                    }
                }
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Def_Procedimientos  $def_Procedimientos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Def_Procedimientos $def_Procedimientos)
    {
        //
    }
}
