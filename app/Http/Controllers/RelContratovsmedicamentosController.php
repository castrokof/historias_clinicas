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
            ->where('rel__contratovsmedicamentos.contrato_id', '=', $idlist)
            ->get();
          
        return  DataTables()->of($datast)
        ->addColumn('actionmd', function($datast){
        $button = '<button type="button" name="eliminarmd" id="'.$datast->idd.'"
        class = "eliminarmd btn-float  bg-gradient-danger btn-sm tooltipsC"  title="Eliminar Relación"><i class=""><i class="fa fa-trash"></i></i></a>'. 
        '<button type="button" name="editm" id="'.$datast->idd.'" class = "editm btn-float  bg-gradient-info btn-sm tooltipsC"  title="Editar Items"><i class=""><i class="fa fa-edit"></i></i></a>';
               
        return $button;

        }) 
        ->rawColumns(['actionmd'])
        ->make(true);
        
     }

     
      /* return view('admin.financiero.contratos.index', compact('datast')); */
      return view('admin.financiero.contratos.index');
    }

    public function indexContr(Request $request)
    {
        $usuario_id = $request->session()->get('usuario_id');
        $idlist = $request->id;

        if($request->ajax()){
            $datast = DB::table('rel__contratovsmedicamentos')
            ->Join('def__contratos', 'rel__contratovsmedicamentos.contrato_id', '=', 'def__contratos.id_contrato')
            ->Join('def__medicamentos_suministros', 'rel__contratovsmedicamentos.medicamento_id', '=', 'def__medicamentos_suministros.id_medicamento')
            ->select('rel__contratovsmedicamentos.id_contratovsmedicamento as idd','def__contratos.contrato as contrato', 'def__contratos.nombre as nombre','rel__contratovsmedicamentos.valor as precio',
                    'def__medicamentos_suministros.codigo as codigo','def__medicamentos_suministros.nombre as Medicamento')
            ->where('rel__contratovsmedicamentos.medicamento_id', '=', $idlist)
            ->get();
          
        return  DataTables()->of($datast)
        ->addColumn('actionpm', function($datast){
        $button = '<button type="button" name="eliminarmd" id="'.$datast->idd.'"
        class = "eliminarmd btn-float  bg-gradient-danger btn-sm tooltipsC"  title="Eliminar Relación"><i class=""><i class="fa fa-trash"></i></i></a>'. 
        '<button type="button" name="editm" id="'.$datast->idd.'" class = "editm btn-float  bg-gradient-info btn-sm tooltipsC"  title="Editar Item"><i class=""><i class="fa fa-edit"></i></i></a>';
               
        return $button;

        }) 
        ->rawColumns(['actionpm'])
        ->make(true);
        
     }

     
      /* return view('admin.financiero.contratos.index', compact('datast')); */
      return view('admin.financiero.medicamentos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->ajax()) {

            $idps = $request->medicamento_id;

            foreach ($idps as $idp) {

                $count = DB::table('rel__contratovsmedicamentos')->where([
                    ['medicamento_id',  $idp],
                    ['contrato_id', $request->contrato_id]
                ])->count();

                if ($count > 0) {
                    DB::table('rel__contratovsmedicamentos')
                   ->where([
                    ['medicamento_id',  $idp],
                    ['contrato_id', $request->contrato_id]
                    ])->update(
                        [
                            'medicamento_id' => $idp,
                            'contrato_id' => $request->contrato_id

                        ]
                    );
                }else{
                DB::table('rel__contratovsmedicamentos')
                    ->insert(
                        [
                            'medicamento_id' => $idp,
                            'contrato_id' => $request->contrato_id

                        ]
                    );
                }
            }

            return response()->json(['success' => 'ok']);
        }
    }

    public function crear(Request $request)
    {
        if ($request->ajax()) {

            $idps = $request->contrato_id;

            foreach ($idps as $idp) {

                $count = DB::table('rel__contratovsmedicamentos')->where([
                    ['contrato_id', $idp],
                    ['medicamento_id', $request->medicamento_id]
                ])->count();

                if ($count > 0) {
                    DB::table('rel__contratovsmedicamentos')
                        ->where([
                            ['contrato_id', $idp],
                            ['medicamento_id', $request->medicamento_id]
                        ])->update(
                            [
                                'contrato_id' => $idp,
                                'medicamento_id' => $request->medicamento_id
    
                            ]
                        );
                } else {
                    DB::table('rel__contratovsmedicamentos')
                        ->insert(
                            [

                                'contrato_id' => $idp,
                                'medicamento_id' => $request->medicamento_id


                            ]
                        );
                }
            }

            return response()->json(['success' => 'ok']);
        }
    }

    public function editar($id)
    {
        if (request()->ajax()) {

            // $data = DB::table('rel__contratovsprocedimientos')
            //  ->Join('def__contratos', 'rel__contratovsprocedimientos.contrato_id', '=', 'def__contratos.id_contrato')
            //  ->Join('def__procedimientos', 'rel__contratovsprocedimientos.medicamento_id', '=', 'def__procedimientos.id_cups')
            //  ->select('rel__contratovsprocedimientos.id_contratovsprocedimiento as idd','def__contratos.contrato as contrato', 'def__contratos.nombre as nombre_c','rel__contratovsprocedimientos.valor as precio',
            //          'def__procedimientos.cod_cups as cups','def__procedimientos.nombre as Procedimiento')
            //  ->where('rel__contratovsprocedimientos.id_contratovsprocedimiento', '=', $id )
            //  ->first();
            $data = DB::table('rel__contratovsmedicamentos')
            ->Join('def__contratos', 'rel__contratovsmedicamentos.contrato_id', '=', 'def__contratos.id_contrato')
            ->Join('def__medicamentos_suministros', 'rel__contratovsmedicamentos.medicamento_id', '=', 'def__medicamentos_suministros.id_medicamento')
            ->select('rel__contratovsmedicamentos.id_contratovsmedicamento as idd','def__contratos.contrato as contrato', 'def__contratos.nombre as nombre_contrato','rel__contratovsmedicamentos.valor as precio',
                    'def__medicamentos_suministros.codigo as codigo_med','def__medicamentos_suministros.nombre as Medicamento')
            ->where('rel__contratovsmedicamentos.id_contratovsmedicamento', '=', $id)
            ->first();

            return response()->json(['result' => $data]);
        }
        return view('admin.financiero.contratos.index');
    }

    public function actualizar(Request $request, $id)
    {
        $rules = array(
            
            'valor'  => 'required'
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $data = DB::table('rel__contratovsmedicamentos')->where('id_contratovsmedicamento', '=', $id)
            ->update([
                'valor' => $request->valor,
                'updated_at' => now()
            ]);
        //$data->update($request->all());
        return response()->json(['success' => 'ok1']);
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

        return response()->json(['success' => 'ok5']);
        }
    }
}
