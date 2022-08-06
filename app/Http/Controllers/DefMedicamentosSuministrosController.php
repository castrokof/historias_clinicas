<?php

namespace App\Http\Controllers;

use App\Models\Admin\Def_MedicamentosSuministros;
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
    public function index()
    {
        //
    }

    public function rel_index(Request $request)
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
        
        return view('admin.financiero.profesionales.index');
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
