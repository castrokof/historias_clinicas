<?php

namespace App\Http\Controllers;

use App\Models\Admin\Planfarmacologico;
use App\Models\Admin\Planterapeutico;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PlanterapeuticoController extends Controller
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
            $datast = DB::table('planterapeutico')
            ->Join('historia', 'planterapeutico.historia_id', '=', 'historia.id_historia')
            ->Join('cups', 'planterapeutico.cups_id', '=', 'cups.id_cups')
            ->select('planterapeutico.id_plant as idpt', 'cups.cod_cups as cod_cups','cups.nombre as nombre','planterapeutico.observacion as observacion', 'planterapeutico.created_at as created_at')
            ->where('planterapeutico.historia_id', '=', $request->historia_idp )
            ->get();
            

        return  DataTables()->of($datast)
        ->addColumn('actionpt', function($datast){
        $button = '<button type="button" name="eliminarpt" id="'.$datast->idpt.'"
        class = "eliminarpt btn-float  bg-gradient-danger btn-sm tooltipsC"  title="eliminar plan terapeutico"><i class="fas fa-diagnoses"><i class="fa fa-pencil"></i></i></a>';
               
        return $button;

        }) 
        ->rawColumns(['actionpt'])
        ->make(true);
        
     }

     
      return view('admin.historia.index', compact('datast'));
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
 
 
 
 
         Planterapeutico::create($request->all());
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
 
               Planterapeutico::where('id_plant', $id)->delete();

        return response()->json(['success' => 'ok1']);
        }
    }
}
