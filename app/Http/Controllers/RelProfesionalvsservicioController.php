<?php

namespace App\Http\Controllers;

use App\Models\Admin\rel__profesionalvsservicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RelProfesionalvsservicioController extends Controller
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
           /* $datast = rel__profesionalvsservicio::orderBy('id', 'asc')
           ->where('profesional_id', "=", $idlist)->get(); */
            $datast = DB::table('rel__profesionalvsservicio')
            ->Join('servicios', 'rel__profesionalvsservicio.servicio_id', '=', 'servicios.id_servicio')
            ->Join('def__profesionales', 'rel__profesionalvsservicio.profesional_id', '=', 'def__profesionales.id_profesional')
            ->select('rel__profesionalvsservicio.id_profesionalvsservicio as idd','servicios.cod_servicio as cod_servicio', 'servicios.nombre as nombre',
                    'def__profesionales.codigo as codigo','def__profesionales.nombre as Profesional')
            ->where('rel__profesionalvsservicio.profesional_id', '=', $idlist )
            ->get();
          
        return  DataTables()->of($datast)
        ->addColumn('actionps', function($datast){
        $button = '<button type="button" name="eliminarps" id="'.$datast->idd.'"
        class = "eliminarps btn-float  bg-gradient-danger btn-sm tooltipsC"  title="Eliminar Relación"><i class=""><i class="fa fa-trash"></i></i></a>';
               
        return $button;

        }) 
        ->rawColumns(['actionps'])
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
     * @param  \App\Models\rel__profesionalvsservicio  $rel_profesionalvsservicio
     * @return \Illuminate\Http\Response
     */
    public function show(rel__profesionalvsservicio $rel_profesionalvsservicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rel_profesionalvsservicio  $rel_profesionalvsservicio
     * @return \Illuminate\Http\Response
     */
    public function edit(rel__profesionalvsservicio $rel_profesionalvsservicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\rel__profesionalvsservicio  $rel_profesionalvsservicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rel__profesionalvsservicio $rel__profesionalvsservicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rel__profesionalvsservicio  $rel_profesionalvsservicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(rel__profesionalvsservicio $rel__profesionalvsservicio)
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
 
            rel__profesionalvsservicio::where('id_profesionalvsservicio', $id)->delete();

        return response()->json(['success' => 'ok1']);
        }
    }
}
