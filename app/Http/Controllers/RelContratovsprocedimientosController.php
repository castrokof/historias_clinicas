<?php

namespace App\Http\Controllers;

use App\Models\Admin\rel__contratovsprocedimientos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RelContratovsprocedimientosController extends Controller
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
           /* $datast = rel__contratovsprocedimientos::orderBy('id', 'asc')
           ->where('procedimiento_id', "=", $idlist)->get(); */
            $datast = DB::table('rel__contratovsprocedimientos')
            ->Join('def__contratos', 'rel__contratovsprocedimientos.contrato_id', '=', 'def__contratos.id_contrato')
            ->Join('def__procedimientos', 'rel__contratovsprocedimientos.procedimiento_id', '=', 'def__procedimientos.id_cups')
            ->select('rel__contratovsprocedimientos.procedimiento_id as idd','def__contratos.contrato as contrato', 'def__contratos.nombre as nombre','rel__contratovsprocedimientos.valor as precio',
                    'def__procedimientos.cod_cups as cups','def__procedimientos.nombre as Procedimiento')
            ->where('rel__contratovsprocedimientos.procedimiento_id', '=', $idlist )
            ->get();
          
        return  DataTables()->of($datast)
        ->addColumn('actionpt', function($datast){
        $button = '<button type="button" name="eliminarpt" id="'.$datast->idd.'"
        class = "eliminarpt btn-float  bg-gradient-danger btn-sm tooltipsC"  title="ninguna accion"><i class="fas fa-diagnoses"><i class="fa fa-pencil"></i></i></a>';
               
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
     * @param  \App\Models\Admin\rel__contratovsprocedimientos  $rel__contratovsprocedimientos
     * @return \Illuminate\Http\Response
     */
    public function show(rel__contratovsprocedimientos $rel__contratovsprocedimientos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\rel__contratovsprocedimientos  $rel__contratovsprocedimientos
     * @return \Illuminate\Http\Response
     */
    public function edit(rel__contratovsprocedimientos $rel__contratovsprocedimientos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\rel__contratovsprocedimientos  $rel__contratovsprocedimientos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rel__contratovsprocedimientos $rel__contratovsprocedimientos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\rel__contratovsprocedimientos  $rel__contratovsprocedimientos
     * @return \Illuminate\Http\Response
     */
    public function destroy(rel__contratovsprocedimientos $rel__contratovsprocedimientos)
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
 
            rel__contratovsprocedimientos::where('id_contratovsprocedimiento', $id)->delete();

        return response()->json(['success' => 'ok1']);
        }
    }
}
