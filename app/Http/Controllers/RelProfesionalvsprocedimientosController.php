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
            ->select('rel__profesionalvsprocedimientos.id_profesionalvsprocedimientos as idd','def__profesionales.codigo as codigo', 'def__profesionales.nombre as nombre',
                    'def__procedimientos.cod_cups as cups','def__procedimientos.nombre as Procedimiento')
            ->where('rel__profesionalvsprocedimientos.procedimiento_id', '=', $idlist )
            ->get();
          
        return  DataTables()->of($datast)
        ->addColumn('actionpt', function($datast){
        $button = '<button type="button" name="eliminarpp" id="'.$datast->idd.'" 
        class = "eliminarpp btn-float  bg-gradient-danger btn-sm tooltipsC"  title="Eliminar Relacion"><i class="fas fa-diagnoses"><i class="fa fa-pencil"></i></i></a>';
               
        return $button;

        }) 
        ->rawColumns(['actionpt'])
        ->make(true);
        
     } 

     
      /* return view('admin.financiero.procedimientos.index', compact('datast')); */
      return view('admin.financiero.procedimientos.index');
    }

    public function indexProfe(Request $request)
    {
        $usuario_id = $request->session()->get('usuario_id');
        $idlist = $request->id;

        if($request->ajax()){
           /* $datast = rel__profesionalvsprocedimientos::orderBy('id', 'asc')
           ->where('procedimiento_id', "=", $idlist)->get(); */
            $datast = DB::table('rel__profesionalvsprocedimientos')
            ->Join('def__profesionales', 'rel__profesionalvsprocedimientos.profesional_id', '=', 'def__profesionales.id_profesional')
            ->Join('def__procedimientos', 'rel__profesionalvsprocedimientos.procedimiento_id', '=', 'def__procedimientos.id_cups')
            ->select('rel__profesionalvsprocedimientos.id_profesionalvsprocedimientos as idd','def__profesionales.codigo as codigo', 'def__profesionales.nombre as nombre',
                    'def__procedimientos.cod_cups as cups','def__procedimientos.nombre as Procedimiento')
            ->where('rel__profesionalvsprocedimientos.profesional_id', '=', $idlist )
            ->get();
          
        return  DataTables()->of($datast)
        ->addColumn('actionpp', function($datast){
        $button = '<button type="button" name="eliminarpp" id="'.$datast->idd.'"
        class = "eliminarpp btn-float  bg-gradient-danger btn-sm tooltipsC"  title="Eliminar Relación"><i class="fas fa-diagnoses"><i class="fa fa-trash"></i></i></a>';
               
        return $button;

        }) 
        ->rawColumns(['actionpp'])
        ->make(true);
        
     } 

     
      /* return view('admin.financiero.procedimientos.index', compact('datast')); */
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request, $id)
    {
        if($request->ajax()){

            $datasp = DB::table('rel__profesionalvsprocedimientos')
            ->where('id_profesionalvsprocedimientos', '=', $id )
            ->delete();

        return response()->json(['success' => 'ok3']);
        }
    }
}
