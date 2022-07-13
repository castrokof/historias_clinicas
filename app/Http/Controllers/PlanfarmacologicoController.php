<?php

namespace App\Http\Controllers;

use App\Models\Admin\Planfarmacologico;
use App\Models\Admin\Planterapeutico;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Validation\Validator;

class PlanfarmacologicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuario_id = $request->session()->get('usuario_id');
        $fechaI= Carbon::now()->toDateString()." 00:00:00";
        $fechaF= Carbon::now()->toDateString()." 23:59:59";

                
        if($request->ajax()){
            $datas = DB::table('planfarmacologico')
            ->Join('historia', 'planfarmacologico.historia_id', '=', 'historia.id_historia')
            ->Join('cums', 'planfarmacologico.cums_id', '=', 'cums.id_cums')
            ->select('planfarmacologico.id_planf as idpf','cums.cums as cums','cums.nombre_medto as nombre','cums.descripcion_medto as descripcion', 'planfarmacologico.cantidad as cantidad', 'planfarmacologico.dosis as dosis', 'planfarmacologico.total_dosis as total_dosis', 'planfarmacologico.duracion_tmto as duracion_tmto', 'planfarmacologico.observacion as observacion', 'planfarmacologico.created_at as created_at', 'planfarmacologico.via_administracion as via', 'planfarmacologico.frecuencia_hora as frecuencia')
            ->where('planfarmacologico.historia_id', '=', $request->historia_idp )
            ->get();
            

        return  DataTables()->of($datas)
        ->addColumn('actionpf', function($datas){
        $button = '<button type="button" name="eliminarpf" id="'.$datas->idpf.'"
        class = "eliminarpf btn-float  bg-gradient-danger btn-sm tooltipsC"  title="eliminar plan farmacologico"><i class="fas fa-diagnoses"><i class="fa fa-pencil"></i></i></a>';
               
      return $button;

        }) 
        ->rawColumns(['actionpf'])
        ->make(true);
        
     }

     
      return view('admin.historia.index', compact('datas'));
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
    public function guardar(Request $request)
    {
        if($request->ajax()){
           
            $rules = array(
 
                 'observacion' => 'max:255'
 
                 
                 
             );
     
             $error = FacadesValidator::make($request->all(), $rules);
     
             if($error->fails()) {
                 return response()->json(['errors' => $error->errors()->all()]);
             }
 
 
 
 
         Planfarmacologico::create(
          [
            'cums_id' => $request->cums_id,
            'historia_id' => $request->historia_id,
            'via_administracion' => $request->via_administracion,
            'dosis' => $request->dosis."--".$request->unidad_medida,
            'frecuencia_hora' => $request->cada."--".$request->unidad_tiempo_1,
            'duracion_tmto' => $request->duracion."--".$request->unidad_tiempo_2,
            'total_dosis' => $request->total_dosis,
            'observacion' => $request->observacion

          ]);
         return response()->json(['success' => 'ok']);
         
          } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
 
               Planfarmacologico::where('id_planf', $id)->delete();

        return response()->json(['success' => 'ok1']);
        }
    }
}
