<?php

namespace App\Http\Controllers;

use App\Models\Admin\rel__serviciovsprocedimientos;


use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RelServiciovsprocedimientosController extends Controller
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
           /* $datast = rel__serviciovsprocedimientos::orderBy('id', 'asc')
           ->where('procedimiento_id', "=", $idlist)->get(); */
            $datast = DB::table('rel__serviciovsprocedimientos')
            ->Join('servicios', 'rel__serviciovsprocedimientos.servicio_id', '=', 'servicios.id_servicio')
            ->Join('def__procedimientos', 'rel__serviciovsprocedimientos.procedimiento_id', '=', 'def__procedimientos.id_cups')
            ->select('rel__serviciovsprocedimientos.id as idd','servicios.cod_servicio as cod_servicio', 'servicios.nombre as nombre',
                    'def__procedimientos.cod_cups as cups','def__procedimientos.nombre as Procedimiento')
            ->where('rel__serviciovsprocedimientos.procedimiento_id', '=', $idlist )
            ->get();
          
        return  DataTables()->of($datast)
        ->addColumn('actionpt', function($datast){
        $button = '<button type="button" name="eliminarss" id="'.$datast->idd.'"
        class = "eliminarss btn-float  bg-gradient-danger btn-sm tooltipsC"  title="Eliminar Relación"><i class="fas fa-diagnoses"><i class="fa fa-pencil"></i></i></a>';
               
        return $button;

        }) 
        ->rawColumns(['actionpt'])
        ->make(true);
        
     }

     
      /* return view('admin.financiero.procedimientos.index', compact('datast')); */
      return view('admin.financiero.procedimientos.index');
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
     * @param  \App\Models\Admin\rel__serviciovsprocedimientos  $rel__serviciovsprocedimientos
     * @return \Illuminate\Http\Response
     */
    public function show(rel__serviciovsprocedimientos $rel__serviciovsprocedimientos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\rel__serviciovsprocedimientos  $rel__serviciovsprocedimientos
     * @return \Illuminate\Http\Response
     */
    public function edit(rel__serviciovsprocedimientos $rel__serviciovsprocedimientos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\rel__serviciovsprocedimientos  $rel__serviciovsprocedimientos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rel__serviciovsprocedimientos $rel__serviciovsprocedimientos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\rel__serviciovsprocedimientos  $rel__serviciovsprocedimientos
     * @return \Illuminate\Http\Response
     */
    public function destroy(rel__serviciovsprocedimientos $rel__serviciovsprocedimientos)
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
 
            // rel__serviciovsprocedimientos::where('id', $id)->delete();
            $datasp = DB::table('rel__serviciovsprocedimientos')
            ->where('id', '=', $id )
            ->delete();

        return response()->json(['success' => 'ok4']);
        }
    }
}
