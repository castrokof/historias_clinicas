<?php

namespace App\Http\Controllers;

use App\Models\Admin\rel__serviciovsmedicamentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RelServiciovsmedicamentosController extends Controller
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
            $datast = DB::table('rel__serviciovsmedicamentos')
                ->Join('def__medicamentos_suministros', 'rel__serviciovsmedicamentos.medicamento_id', '=', 'def__medicamentos_suministros.id_medicamento')
                ->Join('servicios', 'rel__serviciovsmedicamentos.servicio_id', '=', 'servicios.id_servicio')
                ->select(
                    'rel__serviciovsmedicamentos.id_serviciovsmedicamentos as idd',
                    'def__medicamentos_suministros.codigo as cod_medicamento',
                    'def__medicamentos_suministros.nombre as medicamento',
                    'servicios.cod_servicio as cod_servicio',
                    'servicios.nombre as servicio'
                )
                ->where('rel__serviciovsmedicamentos.medicamento_id', '=', $idlist)
                ->get();

            return  DataTables()->of($datast)
                ->addColumn('actionps', function ($datast) {
                    $button = '<button type="button" name="eliminarps" id="' . $datast->idd . '"
        class = "eliminarps btn-float  bg-gradient-danger btn-sm tooltipsC"  title="Eliminar Relación"><i class=""><i class="fa fa-trash"></i></i></a>';

                    return $button;
                })
                ->rawColumns(['actionps'])
                ->make(true);
        }


        /* return view('admin.financiero.profesionales.index', compact('datast')); */
        return view('admin.financiero.medicamentos.index');
    }

    public function create(Request $request)
    {
        if ($request->ajax()) {

            $idps = $request->servicio_id;

            foreach ($idps as $idp) {

                $count = DB::table('rel__serviciovsmedicamentos')->where([
                    ['servicio_id', $idp],
                    ['medicamento_id', $request->medicamento_id]
                ])->count();

                if ($count > 0) {
                    DB::table('rel__serviciovsmedicamentos')
                        ->where([
                            ['servicio_id', $idp],
                            ['medicamento_id', $request->medicamento_id]
                        ])->update(
                            [
                                'servicio_id' => $idp,
                                'medicamento_id' => $request->medicamento_id
    
                            ]
                        );
                } else {
                    DB::table('rel__serviciovsmedicamentos')
                        ->insert(
                            [

                                'servicio_id' => $idp,
                                'medicamento_id' => $request->medicamento_id


                            ]
                        );
                }
            }

            return response()->json(['success' => 'ok']);
        }
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

            rel__serviciovsmedicamentos::where('id_serviciovsmedicamentos', $id)->delete();

            return response()->json(['success' => 'ok1']);
        }
    }

    
}
