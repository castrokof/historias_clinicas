<?php

namespace App\Http\Controllers;

use App\Models\Admin\Diagnostico;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DiagnosticoController extends Controller
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
            $datas = DB::table('diagnostico')
            ->Join('historia', 'diagnostico.historia_id', '=', 'historia.id_historia')
            ->Join('cie10', 'diagnostico.cie10_id', '=', 'cie10.id_cie10')
            ->select('diagnostico.id_diagnostico as idd','cie10.codigo_cie10 as codigo_cie10','cie10.nombre as nombre','diagnostico.tipo as tipo', 'diagnostico.observacion as observacion', 'diagnostico.created_at as created_at')
            ->where('diagnostico.historia_id', '=', $request->historia_idp )
            ->get();
            

        return  DataTables()->of($datas)
        ->addColumn('actiond', function($datas){
        $button = '<button type="button" name="eliminard" id="'.$datas->idd.'"
        class = "eliminard btn-float  bg-gradient-danger btn-sm tooltipsC"  title="eliminar Diagnostico"><i class="fas fa-diagnoses"><i class="fa fa-pencil"></i></i></a>';
               
      return $button;

        }) 
        ->rawColumns(['actiond'])
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
     
             $error = Validator::make($request->all(), $rules);
     
             if($error->fails()) {
                 return response()->json(['errors' => $error->errors()->all()]);
             }
 
             $diagnosticop = DB::table('diagnostico')
               ->where([
                ['cie10_id', '=', $request->cie10_id], ['historia_id', '=', $request->historia_id]]
               )
               ->count();
       
        if($diagnosticop > 0){

            return response()->json(['success' => 'okdp']);

        }else{

         Diagnostico::create($request->all());
         return response()->json(['success' => 'ok']);
        }
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
 
               Diagnostico::where('id_diagnostico', $id)->delete();

        return response()->json(['success' => 'ok1']);
        }
    }
}
