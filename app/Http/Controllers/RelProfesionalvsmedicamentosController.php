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

        if ($request->ajax()) {
            /* $datast = rel__profesionalvsmedicamentos::orderBy('id', 'asc')
           ->where('profesional_id', "=", $idlist)->get(); */
            $datast = DB::table('rel__profesionalvsmedicamentos')
                ->Join('def__medicamentos_suministros', 'rel__profesionalvsmedicamentos.medicamento_id', '=', 'def__medicamentos_suministros.id_medicamento')
                ->Join('def__profesionales', 'rel__profesionalvsmedicamentos.profesional_id', '=', 'def__profesionales.id_profesional')
                ->select(
                    'rel__profesionalvsmedicamentos.id_profesionalvsmedicamentos as idd',
                    'def__medicamentos_suministros.codigo as cod_medicamento',
                    'def__medicamentos_suministros.nombre as medicamento',
                    'def__profesionales.codigo as codigo',
                    'def__profesionales.nombre as Profesional'
                )
                ->where('rel__profesionalvsmedicamentos.profesional_id', '=', $idlist)
                ->get();

            return  DataTables()->of($datast)
                ->addColumn('actionpm', function ($datast) {
                    $button = '<button type="button" name="eliminarpm" id="' . $datast->idd . '"
        class = "eliminarpm btn-float  bg-gradient-danger btn-sm tooltipsC"  title="Eliminar Relación"><i class=""><i class="fa fa-trash"></i></i></a>';

                    return $button;
                })
                ->rawColumns(['actionpm'])
                ->make(true);
        }


        /* return view('admin.financiero.profesionales.index', compact('datast')); */
        return view('admin.financiero.profesionales.index');
    }

    public function indexProfe(Request $request)
    {
        $usuario_id = $request->session()->get('usuario_id');
        $idlist = $request->id;

        if ($request->ajax()) {
            $datast = DB::table('rel__profesionalvsmedicamentos')
                ->Join('def__medicamentos_suministros', 'rel__profesionalvsmedicamentos.medicamento_id', '=', 'def__medicamentos_suministros.id_medicamento')
                ->Join('def__profesionales', 'rel__profesionalvsmedicamentos.profesional_id', '=', 'def__profesionales.id_profesional')
                ->select(
                    'rel__profesionalvsmedicamentos.id_profesionalvsmedicamentos as idd',
                    'def__medicamentos_suministros.codigo as cod_medicamento',
                    'def__medicamentos_suministros.nombre as medicamento',
                    'def__profesionales.codigo as codigo',
                    'def__profesionales.nombre as Profesional'
                )
                ->where('rel__profesionalvsmedicamentos.medicamento_id', '=', $idlist)
                ->get();

            return  DataTables()->of($datast)
                ->addColumn('actionpp', function ($datast) {
                    $button = '<button type="button" name="eliminarpp" id="' . $datast->idd . '"
        class = "eliminarpp btn-float  bg-gradient-danger btn-sm tooltipsC"  title="Eliminar Relación"><i class=""><i class="fa fa-trash"></i></i></a>';

                    return $button;
                })
                ->rawColumns(['actionpp'])
                ->make(true);
        }


        /* return view('admin.financiero.procedimientos.index', compact('datast')); */
        return view('admin.financiero.medicamentos.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->ajax()) {

            $idms = $request->medicamento_id;

            foreach ($idms as $idm) {

                $count = DB::table('rel__profesionalvsmedicamentos')->where([
                    ['medicamento_id', $idm],
                    ['profesional_id', $request->profesional_id]
                ])->count();

                if ($count > 0) {
                    DB::table('rel__profesionalvsmedicamentos')
                   ->where([
                        ['medicamento_id', $idm],
                        ['profesional_id', $request->profesional_id]
                    ])->update(
                        [
                            'medicamento_id' => $idm,
                            'profesional_id' => $request->profesional_id

                        ]
                    );
                }else{
                DB::table('rel__profesionalvsmedicamentos')
                    ->insert(
                        [
                            'medicamento_id' => $idm,
                            'profesional_id' => $request->profesional_id

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

            $idps = $request->profesional_id;

            foreach ($idps as $idp) {

                $count = DB::table('rel__profesionalvsmedicamentos')->where([
                    ['profesional_id', $idp],
                    ['medicamento_id', $request->medicamento_id]
                ])->count();

                if ($count > 0) {
                    DB::table('rel__profesionalvsmedicamentos')
                        ->where([
                            ['profesional_id', $idp],
                            ['medicamento_id', $request->medicamento_id]
                        ])->update(
                            [
                                'profesional_id' => $idp,
                                'medicamento_id' => $request->medicamento_id
    
                            ]
                        );
                } else {
                    DB::table('rel__profesionalvsmedicamentos')
                        ->insert(
                            [

                                'profesional_id' => $idp,
                                'medicamento_id' => $request->medicamento_id


                            ]
                        );
                }
            }

            return response()->json(['success' => 'ok']);
        }
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request, $id)
    {
        if ($request->ajax()) {

            rel__profesionalvsmedicamentos::where('id_profesionalvsmedicamentos', $id)->delete();

            return response()->json(['success' => 'ok3']);
        }
    }
}
