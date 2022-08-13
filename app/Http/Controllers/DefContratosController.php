<?php

namespace App\Http\Controllers;

use App\Models\Admin\Def_Contratos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;

class DefContratosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {


            $datas = Def_Contratos::orderBy('id_contrato', 'asc')->get();

            return  DataTables()->of($datas)
                ->addColumn('action', function ($datas) {
                    $button = '<button type="button" name="Detalle" id="' . $datas->id_contrato . '" class="listasDetalleAll btn btn-app bg-success tooltipsC" title="Relacionar Item"  ><span class="badge bg-teal">Detalle</span><i class="fas fa-list-ul"></i>Relaciones</button>';

                    return $button;
                })->addColumn('estado', function ($datas) {


                    if ($datas->estado == "1") {

                        $button = '
                 <div class="custom-control custom-switch ">
                 <input type="checkbox"  class="check_98 custom-control-input"  id="customSwitch99' . $datas->id_contrato . '" value="' . $datas->id_contrato . '"  checked>
                 <label class="custom-control-label" for="customSwitch99' . $datas->id_contrato . '"  valueid="' . $datas->id_contrato . '"></label>
                 </div>';
                    } else {

                        $button = '
                 <div class="custom-control custom-switch ">
                 <input type="checkbox" class="check_98 custom-control-input" id="customSwitch99' . $datas->id_contrato . '" value="' . $datas->id_contrato . '" >
                 <label class="custom-control-label" for="customSwitch99' . $datas->id_contrato . '"  valueid="' . $datas->id_contrato . '"></label>
                 </div>';
                    }

                    return $button;
                })
                ->rawColumns(['action', 'estado'])
                ->make(true);
        }

        return view('admin.financiero.contratos.index');
    }

    

    public function rel_index(Request $request)
    {

        if ($request->ajax()) {

            $datas = Def_Contratos::orderBy('id_contrato', 'asc')->get();

            return  DataTables()->of($datas)
                ->addColumn('action', function ($datas) {
                    $button = '<button type="button" name="Detalle" id="' . $datas->id_contrato . '" class="listasDetalleAll btn btn-app bg-success tooltipsC" title="Relacionar Item"  ><span class="badge bg-teal">Detalle</span><i class="fas fa-list-ul"></i>Relaciones</button>';

                    return $button;
                })->addColumn('estado', function ($datas) {


                    if ($datas->estado == "1") {

                        $button = '
                 <div class="custom-control custom-switch ">
                 <input type="checkbox"  class="check_98 custom-control-input"  id="customSwitch99' . $datas->id_contrato . '" value="' . $datas->id_contrato . '"  checked>
                 <label class="custom-control-label" for="customSwitch99' . $datas->id_contrato . '"  valueid="' . $datas->id_contrato . '"></label>
                 </div>';
                    } else {

                        $button = '
                 <div class="custom-control custom-switch ">
                 <input type="checkbox" class="check_98 custom-control-input" id="customSwitch99' . $datas->id_contrato . '" value="' . $datas->id_contrato . '" >
                 <label class="custom-control-label" for="customSwitch99' . $datas->id_contrato . '"  valueid="' . $datas->id_contrato . '"></label>
                 </div>';
                    }

                    return $button;
                })
                ->rawColumns(['action', 'estado'])
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
                'contrato' => 'required',
                'nombre' => 'required',
                'descripcion',
                'tipo_contrato' => 'required',
                'fecha_ini',
                'fecha_fin',
                'estado'
            );

            $error = Validator::make($request->all(), $rules);

            if ($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            Def_Contratos::create($request->all());

            return response()->json(['success' => 'ok']);
        }
    }

    /**
     * Display the specified resource.
     *@param  int  $id
     * @param  \App\Models\Admin\Def_Contratos  $def__contratos
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        //
        // $data = Def_Procedimientos::findOrFail($id);
        // return response()->json(['result'=>$data]);
        if (request()->ajax()) {

            $data = Def_Contratos::where('id_contrato', $id)->first();

            return response()->json(['result' => $data]);
        }
        return view('admin.financiero.contratos.index');
    }

    public function updateestado(Request $request)
    {

            if ($request->ajax()) {

                //$procedimientoestado = new Def_Procedimientos();
                

                $datas = DB::table('def__contratos')->select('estado')->where('id_contrato', $request->input('id'))->first();

                //dd($datas);
                //return($datas);

                foreach($datas as $data){

                  if($data == '1'){

                    DB::table('def__contratos')
                    ->where('id_contrato',$request->input('id'))
                    ->update([
                     'estado' => '0'
                            ]);

                    return response()->json(['respuesta' => 'Contrato desactivado', 'titulo' => 'Sistema de Historias Clínicas', 'icon' => 'warning']);
                    }else if($data == '0'){
                        DB::table('def__contratos')
                        ->where('id_contrato',$request->input('id'))
                        ->update([
                         'estado' => '1'
                                ]);

                        return response()->json(['respuesta' => 'Contrato activado correctamente', 'titulo' => 'Sistema de Historias Clínicas', 'icon' => 'warning']);

                    }
                }
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
     * @param  \App\Models\Admin\Def_Contratos  $def_Contratos
     * @return \Illuminate\Http\Response
     */
    public function show(Def_Contratos $def_Contratos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Def_Contratos  $def_Contratos
     * @return \Illuminate\Http\Response
     */
    public function edit(Def_Contratos $def_Contratos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Def_Contratos  $def_Contratos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Def_Contratos $def_Contratos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Def_Contratos  $def_Contratos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Def_Contratos $def_Contratos)
    {
        //
    }

}
