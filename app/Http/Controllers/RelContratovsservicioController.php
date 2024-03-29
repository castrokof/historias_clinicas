<?php

namespace App\Http\Controllers;

use App\Models\Admin\rel__contratovsservicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RelContratovsservicioController extends Controller
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

        if($request->ajax()){
            $datast = DB::table('rel__contratovsservicios')
            ->Join('def__contratos', 'rel__contratovsservicios.contrato_id', '=', 'def__contratos.id_contrato')
            ->Join('servicios', 'rel__contratovsservicios.servicio_id', '=', 'servicios.id_servicio')
            ->select('rel__contratovsservicios.id_contratovsservicios as idd','def__contratos.contrato as contrato', 'def__contratos.nombre as nombre','servicios.cod_servicio','servicios.nombre as Servicio')
            ->where('rel__contratovsservicios.contrato_id', '=', $idlist )
            ->get();
          
        return  DataTables()->of($datast)
        ->addColumn('actionsr', function($datast){
        $button = '<button type="button" name="eliminarss" id="'.$datast->idd.'"
        class = "eliminarss btn-float  bg-gradient-danger btn-sm tooltipsC"  title="Eliminar Relación"><i class=""><i class="fa fa-trash"></i></i></a>';
               
        return $button;

        }) 
        ->rawColumns(['actionsr'])
        ->make(true);
        
     }

     
      /* return view('admin.financiero.contratos.index', compact('datast')); */
      return view('admin.financiero.contratos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->ajax()) {

            $idms = $request->servicio_id;

            foreach ($idms as $idm) {

                $count = DB::table('rel__contratovsservicios')->where([
                    ['servicio_id', $idm],
                    ['contrato_id', $request->contrato_id]
                ])->count();

                if ($count > 0) {
                    DB::table('rel__contratovsservicios')
                   ->where([
                        ['servicio_id', $idm],
                        ['contrato_id', $request->contrato_id]
                    ])->update(
                        [
                            'servicio_id' => $idm,
                            'contrato_id' => $request->contrato_id

                        ]
                    );
                }else{
                DB::table('rel__contratovsservicios')
                    ->insert(
                        [
                            'servicio_id' => $idm,
                            'contrato_id' => $request->contrato_id

                        ]
                    );
                }
            }

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
     * @param  \App\Models\Admin\rel__contratovsservicio  $rel_contratovsservicio
     * @return \Illuminate\Http\Response
     */
    public function show(rel__contratovsservicio $rel__contratovsservicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\rel__contratovsservicio  $rel_contratovsservicio
     * @return \Illuminate\Http\Response
     */
    public function edit(rel__contratovsservicio $rel__contratovsservicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\rel__contratovsservicio  $rel__contratovsservicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rel__contratovsservicio $rel__contratovsservicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\rel__contratovsservicio  $rel_contratovsservicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(rel__contratovsservicio $rel__contratovsservicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request, $id)
    {
        if($request->ajax()){
 
            rel__contratovsservicio::where('id_contratovsservicios', $id)->delete();

        return response()->json(['success' => 'ok2']);
        }
    }
}
