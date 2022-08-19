<?php

namespace App\Http\Controllers;

use App\Models\Admin\Def_MedicamentosSuministros;
use App\Models\Admin\Def_ATC_Medicamentos;
use App\Models\Admin\def__grupoysubgrupomed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DefMedicamentosSuministrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {


            $datas = Def_MedicamentosSuministros::orderBy('id_medicamento', 'asc')->get();

            return  DataTables()->of($datas)
                ->addColumn('action', function ($datas) {
                    $button = '<button type="button" name="Detalle" id="' . $datas->id_medicamento . '" class="listasDetalleAll btn btn-app bg-success tooltipsC" title="Relacionar Item"  ><span class="badge bg-teal">Detalle</span><i class="fas fa-list-ul"></i>Relaciones</button>';

                    return $button;
                })->addColumn('estado', function ($datas) {


                    if ($datas->estado == "1") {

                        $button = '
                 <div class="custom-control custom-switch ">
                 <input type="checkbox"  class="check_98 custom-control-input"  id="customSwitch99' . $datas->id_medicamento . '" value="' . $datas->id_medicamento . '"  checked>
                 <label class="custom-control-label" for="customSwitch99' . $datas->id_medicamento . '"  valueid="' . $datas->id_medicamento . '"></label>
                 </div>';
                    } else {

                        $button = '
                 <div class="custom-control custom-switch ">
                 <input type="checkbox" class="check_98 custom-control-input" id="customSwitch99' . $datas->id_medicamento . '" value="' . $datas->id_medicamento . '" >
                 <label class="custom-control-label" for="customSwitch99' . $datas->id_medicamento . '"  valueid="' . $datas->id_medicamento . '"></label>
                 </div>';
                    }

                    return $button;
                })
                ->rawColumns(['action', 'estado'])
                ->make(true);
        }

        return view('admin.financiero.medicamentos.index');
    }

    public function rel_index(Request $request)
    {

        if ($request->ajax()) {

            $datas = Def_MedicamentosSuministros::orderBy('id_medicamento', 'asc')->get();

            return  DataTables()->of($datas)
                ->addColumn('checkbox', function ($datas) {
                    $checkbox = '<input type="checkbox" name="case[]" value="' . $datas->id_medicamento . '" class="casem tooltipsC" title="Relacionar Medicamento" />';

                    return $checkbox;
                })
                ->rawColumns(['checkbox'])
                ->make(true);
        }

        return view('admin.financiero.profesionales.index');
    }

    public function guardar(Request $request)
    {

        if ($request->ajax()) {

            $usuario_id = $request->session()->get('usuario_id');

            $rules = array(
                'codigo' => 'required',
                'nombre' => 'required',
                'detalle',
                'marca' => 'required',
                'CUMS',
                'ATC_id',
                'subgrupo_id' => 'required',
                'IUM',
                'invima' => 'required',
                'tipo' => 'required',
                'stock_max',
                'stock_min',
                'cantidad_maxima',
                'cantidad_dias',
                'valor_particular',
                'estado'

            );

            $error = Validator::make($request->all(), $rules);

            if ($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            Def_MedicamentosSuministros::create($request->all());

            return response()->json(['success' => 'ok']);
        }
    }

    //Funcion para seleccionar la EPS desde la tabla eps_empresas
    public function selectatc(Request $request)
    {
        $atcmed = [];

        if ($request->has('q')) {

            $term = $request->get('q');
            $atcmed = Def_ATC_Medicamentos::orderBy('id_ATC')
                ->where('cod_atc', 'LIKE', '%' . $term . '%')
                ->orwhere('nombre', 'LIKE', '%' . $term . '%')
                ->orwhere('forma', 'LIKE', '%' . $term . '%')
                ->get();
            return response()->json($atcmed);
        }
    }

    //Funcion para seleccionar el grupo
    public function selectsubgrupo(Request $request)
    {
        $grupmed = [];

        $term = $request->get('q');

        if ($request->ajax()) {
            $grupmed = DB::table('def__subgrupomeds')
                ->Join('def__grupoysubgrupomeds', 'def__subgrupomeds.grupo_id', '=', 'def__grupoysubgrupomeds.id')

                ->where('def__grupoysubgrupomeds.nombre_grupo', 'LIKE', '%' . $term . '%')
                ->orwhere('def__subgrupomeds.descripcion_subgrupo', 'LIKE', '%' . $term . '%')
                ->get();
        }
        return response()->json($grupmed);
    }

    /* //Funcion para seleccionar el grupo
    public function selectgrupo(Request $request)
    {
        $grupmed = [];

        if ($request->has('q')) {

            $term = $request->get('q');
            $grupmed = def__grupoysubgrupomed::orderBy('id')
                ->where('nombre_grupo', 'LIKE', '%' . $term . '%')
                ->get();
            return response()->json($grupmed);
        }
    } */

    /**
     * Display the specified resource.
     *@param  int  $id
     * @param  \App\Models\Admin\Def_MedicamentosSuministros  $def__medicamentos_suministros
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        if (request()->ajax()) {

            $data = Def_MedicamentosSuministros::where('id_medicamento', $id)->first();

            return response()->json(['result' => $data]);
        }
        return view('admin.financiero.medicamentos.index');
    }

    public function updateestado(Request $request)
    {

        if ($request->ajax()) {


            $datas = DB::table('def__medicamentos_suministros')->select('estado')->where('id_medicamento', $request->input('id'))->first();

            foreach ($datas as $data) {

                if ($data == '1') {

                    DB::table('def__medicamentos_suministros')
                        ->where('id_medicamento', $request->input('id'))
                        ->update([
                            'estado' => '0'
                        ]);

                    return response()->json(['respuesta' => 'Medicamento desactivado', 'titulo' => 'Sistema Historias Clínicas', 'icon' => 'warning']);
                } else if ($data == '0') {
                    DB::table('def__medicamentos_suministros')
                        ->where('id_medicamento', $request->input('id'))
                        ->update([
                            'estado' => '1'
                        ]);

                    return response()->json(['respuesta' => 'Medicamento habilitado correctamente', 'titulo' => 'Sistema Historias Clínicas', 'icon' => 'warning']);
                }
            }
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
     * @param  \App\Models\Admin\Def_MedicamentosSuministros  $def_MedicamentosSuministros
     * @return \Illuminate\Http\Response
     */
    public function show(Def_MedicamentosSuministros $def_MedicamentosSuministros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Def_MedicamentosSuministros  $def_MedicamentosSuministros
     * @return \Illuminate\Http\Response
     */
    public function edit(Def_MedicamentosSuministros $def_MedicamentosSuministros)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Def_MedicamentosSuministros  $def_MedicamentosSuministros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Def_MedicamentosSuministros $def_MedicamentosSuministros)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Def_MedicamentosSuministros  $def_MedicamentosSuministros
     * @return \Illuminate\Http\Response
     */
    public function destroy(Def_MedicamentosSuministros $def_MedicamentosSuministros)
    {
        //
    }
}
