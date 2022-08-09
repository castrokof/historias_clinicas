<?php

namespace App\Http\Controllers;

use App\Models\Admin\rel__contratovseps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RelContratovsepsController extends Controller
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
            $datast = DB::table('rel__contratovseps')
            ->Join('def__contratos', 'rel__contratovseps.contrato_id', '=', 'def__contratos.id_contrato')
            ->Join('eps_empresas', 'rel__contratovseps.eps_id', '=', 'eps_empresas.id_eps_empresas')
            ->select('rel__contratovseps.id_contratovseps as idd','def__contratos.contrato as contrato', 'def__contratos.nombre as nombre','eps_empresas.codigo as EPS','eps_empresas.nombre as Empresa')
            ->where('rel__contratovseps.contrato_id', '=', $idlist )
            ->get();
          
        return  DataTables()->of($datast)
        ->addColumn('actionpt', function($datast){
        $button = '<button type="button" name="eliminarce" id="'.$datast->idd.'"
        class = "eliminarce btn-float  bg-gradient-danger btn-sm tooltipsC"  title="Eliminar Relación"><i class=""><i class="fa fa-trash"></i></i></a>';
               
        return $button;

        }) 
        ->rawColumns(['actionpt'])
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
     * @param  \App\Models\Admin\rel__contratovseps  $rel_contratovseps
     * @return \Illuminate\Http\Response
     */
    public function show(rel__contratovseps $rel__contratovseps)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\rel__contratovseps  $rel_contratovseps
     * @return \Illuminate\Http\Response
     */
    public function edit(rel__contratovseps $rel__contratovseps)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\rel__contratovseps  $rel_contratovseps
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rel__contratovseps $rel__contratovseps)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\rel_contratovseps  $rel_contratovseps
     * @return \Illuminate\Http\Response
     */
    public function destroy(rel__contratovseps $rel__contratovseps)
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

            $datasp = DB::table('rel__contratovseps')
            ->where('id_contratovseps', '=', $id )
            ->delete();

        return response()->json(['success' => 'ok3']);
        }
    }
}
