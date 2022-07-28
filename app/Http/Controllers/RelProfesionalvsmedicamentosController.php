<?php

namespace App\Http\Controllers;

use App\Models\Admin\rel__profesionalvsmedicamentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RelProfesionalvsmedicamentosController extends Controller
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
           /* $datast = rel__profesionalvsmedicamentos::orderBy('id', 'asc')
           ->where('profesional_id', "=", $idlist)->get(); */
            $datast = DB::table('rel__profesionalvsmedicamentos')
            ->Join('def__medicamentos_suministros', 'rel__profesionalvsmedicamentos.medicamento_id', '=', 'def__medicamentos_suministros.id_medicamento')
            ->Join('def__profesionales', 'rel__profesionalvsmedicamentos.profesional_id', '=', 'def__profesionales.id_profesional')
            ->select('rel__profesionalvsmedicamentos.profesional_id as idd','def__medicamentos_suministros.codigo as cod_medicamento', 'def__medicamentos_suministros.nombre as medicamento',
                    'def__profesionales.codigo as codigo','def__profesionales.nombre as Profesional')
            ->where('rel__profesionalvsmedicamentos.profesional_id', '=', $idlist )
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

     
      /* return view('admin.financiero.profesionales.index', compact('datast')); */
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
     * @param  \App\Models\Admin\rel__profesionalvsmedicamentos  $rel__profesionalvsmedicamentos
     * @return \Illuminate\Http\Response
     */
    public function show(rel__profesionalvsmedicamentos $rel__profesionalvsmedicamentos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\rel__profesionalvsmedicamentos  $rel_profesionalvsmedicamentos
     * @return \Illuminate\Http\Response
     */
    public function edit(rel__profesionalvsmedicamentos $rel__profesionalvsmedicamentos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\rel__profesionalvsmedicamentos  $rel_profesionalvsmedicamentos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rel__profesionalvsmedicamentos $rel__profesionalvsmedicamentos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rel__profesionalvsmedicamentos  $rel_profesionalvsmedicamentos
     * @return \Illuminate\Http\Response
     */
    public function destroy(rel__profesionalvsmedicamentos $rel__profesionalvsmedicamentos)
    {
        //
    }
}
