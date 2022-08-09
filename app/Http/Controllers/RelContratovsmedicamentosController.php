<?php

namespace App\Http\Controllers;

use App\Models\Admin\rel__contratovsmedicamentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RelContratovsmedicamentosController extends Controller
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
            $datast = DB::table('rel__contratovsmedicamentos')
            ->Join('def__contratos', 'rel__contratovsmedicamentos.contrato_id', '=', 'def__contratos.id_contrato')
            ->Join('def__medicamentos_suministros', 'rel__contratovsmedicamentos.medicamento_id', '=', 'def__medicamentos_suministros.id_medicamento')
            ->select('rel__contratovsmedicamentos.id_contratovsmedicamento as idd','def__contratos.contrato as contrato', 'def__contratos.nombre as nombre','rel__contratovsmedicamentos.valor as precio',
                    'def__medicamentos_suministros.codigo as codigo','def__medicamentos_suministros.nombre as Medicamento')
            ->where('rel__contratovsmedicamentos.contrato_id', '=', $idlist )
            ->get();
          
        return  DataTables()->of($datast)
        ->addColumn('actionmd', function($datast){
        $button = '<button type="button" name="eliminarmd" id="'.$datast->idd.'"
        class = "eliminarmd btn-float  bg-gradient-danger btn-sm tooltipsC"  title="Eliminar Relación"><i class=""><i class="fa fa-trash"></i></i></a>';
               
        return $button;

        }) 
        ->rawColumns(['actionmd'])
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
     * @param  \App\Models\Admin\rel__contratovsmedicamentos  $rel_contratovsmedicamentos
     * @return \Illuminate\Http\Response
     */
    public function show(rel__contratovsmedicamentos $rel__contratovsmedicamentos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\rel__contratovsmedicamentos  $rel_contratovsmedicamentos
     * @return \Illuminate\Http\Response
     */
    public function edit(rel__contratovsmedicamentos $rel__contratovsmedicamentos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\rel__contratovsmedicamentos  $rel_contratovsmedicamentos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rel__contratovsmedicamentos $rel__contratovsmedicamentos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\rel__contratovsmedicamentos  $rel_contratovsmedicamentos
     * @return \Illuminate\Http\Response
     */
    public function destroy(rel__contratovsmedicamentos $rel__contratovsmedicamentos)
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
 
            rel__contratovsmedicamentos::where('id_contratovsmedicamento', $id)->delete();

        return response()->json(['success' => 'ok1']);
        }
    }
}
