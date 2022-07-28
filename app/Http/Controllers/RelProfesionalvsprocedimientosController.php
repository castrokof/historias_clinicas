<?php

namespace App\Http\Controllers;

use App\Models\Admin\rel__profesionalvsprocedimientos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RelProfesionalvsprocedimientosController extends Controller
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
           /* $datast = rel__profesionalvsprocedimientos::orderBy('id', 'asc')
           ->where('procedimiento_id', "=", $idlist)->get(); */
            $datast = DB::table('rel__profesionalvsprocedimientos')
            ->Join('def__profesionales', 'rel__profesionalvsprocedimientos.profesional_id', '=', 'def__profesionales.id_profesional')
            ->Join('def__procedimientos', 'rel__profesionalvsprocedimientos.procedimiento_id', '=', 'def__procedimientos.id_cups')
            ->select('rel__profesionalvsprocedimientos.procedimiento_id as idd','def__profesionales.codigo as codigo', 'def__profesionales.nombre as nombre',
                    'def__procedimientos.cod_cups as cups','def__procedimientos.nombre as Procedimiento')
            ->where('rel__profesionalvsprocedimientos.profesional_id', '=', $idlist )
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
     * @param  \App\Models\Admin\rel__profesionalvsprocedimientos  $rel_profesionalvsprocedimientos
     * @return \Illuminate\Http\Response
     */
    public function show(rel__profesionalvsprocedimientos $rel__profesionalvsprocedimientos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\rel__profesionalvsprocedimientos  $rel_profesionalvsprocedimientos
     * @return \Illuminate\Http\Response
     */
    public function edit(rel__profesionalvsprocedimientos $rel__profesionalvsprocedimientos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\rel_profesionalvsprocedimientos  $rel_profesionalvsprocedimientos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rel__profesionalvsprocedimientos $rel__profesionalvsprocedimientos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\rel__profesionalvsprocedimientos  $rel_profesionalvsprocedimientos
     * @return \Illuminate\Http\Response
     */
    public function destroy(rel__profesionalvsprocedimientos $rel__profesionalvsprocedimientos)
    {
        //
    }
}
