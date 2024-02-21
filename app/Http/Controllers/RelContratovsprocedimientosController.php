<?php

namespace App\Http\Controllers;

use App\Models\Admin\rel__contratovsprocedimientos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RelContratovsprocedimientosController extends Controller
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
            /* $datast = rel__contratovsprocedimientos::orderBy('id', 'asc')
           ->where('procedimiento_id', "=", $idlist)->get(); */
            $datast = DB::table('rel__contratovsprocedimientos')
                ->Join('def__contratos', 'rel__contratovsprocedimientos.contrato_id', '=', 'def__contratos.id_contrato')
                ->Join('def__procedimientos', 'rel__contratovsprocedimientos.procedimiento_id', '=', 'def__procedimientos.id_cups')
                ->select(
                    'rel__contratovsprocedimientos.id_contratovsprocedimiento as idd',
                    'def__contratos.contrato as contrato',
                    'def__contratos.nombre as nombre',
                    'rel__contratovsprocedimientos.valor as precio',
                    'def__procedimientos.cod_cups as cups',
                    'def__procedimientos.nombre as Procedimiento'
                )
                ->where('rel__contratovsprocedimientos.procedimiento_id', '=', $idlist)
                ->get();

            return  DataTables()->of($datast)
                ->addColumn('actionpt', function ($datast) {
                    $button = '<button type="button" name="eliminarco" id="' . $datast->idd . '"
        class = "eliminarco btn-float  bg-gradient-danger btn-sm tooltipsC"  title="Eliminar Relación"><i class=""><i class="fa fa-trash"></i></i></a>';

                    return $button;
                })
                ->rawColumns(['actionpt'])
                ->make(true);
        }


        /* return view('admin.financiero.procedimientos.index', compact('datast')); */
        return view('admin.financiero.procedimientos.index');
    }

    public function indexProce(Request $request)
    {
        $usuario_id = $request->session()->get('usuario_id');
        $idlist = $request->id;

        if ($request->ajax()) {
            /* $datast = rel__contratovsprocedimientos::orderBy('id', 'asc')
            ->where('procedimiento_id', "=", $idlist)->get(); */
            $datast = DB::table('rel__contratovsprocedimientos')
                ->Join('def__contratos', 'rel__contratovsprocedimientos.contrato_id', '=', 'def__contratos.id_contrato')
                ->Join('def__procedimientos', 'rel__contratovsprocedimientos.procedimiento_id', '=', 'def__procedimientos.id_cups')
                ->select(
                    'rel__contratovsprocedimientos.id_contratovsprocedimiento as idd',
                    'def__contratos.contrato as contrato',
                    'def__contratos.nombre as nombre',
                    'rel__contratovsprocedimientos.valor as precio',
                    'def__procedimientos.cod_cups as cups',
                    'def__procedimientos.nombre as Procedimiento'
                )
                ->where('rel__contratovsprocedimientos.contrato_id', '=', $idlist)
                ->get();

            return  DataTables()->of($datast)
                ->addColumn('actioncp', function ($datast) {
                    $button = '<button type="button" name="eliminarcp" id="' . $datast->idd . '"
         class = "eliminarcp btn-float  bg-gradient-danger btn-sm tooltipsC"  title="Eliminar Relación"><i class=""><i class="fa fa-trash"></i></i></a>' .
                        '<button type="button" name="editp" id="' . $datast->idd . '" class = "editp btn-float  bg-gradient-info btn-sm tooltipsC"  title="Editar Item"><i class=""><i class="fa fa-edit"></i></i></a>';

                    return $button;
                })
                ->rawColumns(['actioncp'])
                ->make(true);
        }


        /* return view('admin.financiero.procedimientos.index', compact('datast')); */
        return view('admin.financiero.contratos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->ajax()) {

            $idps = $request->procedimiento_id;

            foreach ($idps as $idp) {

                // Obtiene el valor_particular desde def__procedimientos
                $valor_particular = DB::table('def__procedimientos')
                    ->where('id_cups', $idp)
                    ->value('valor_particular');

                $count = DB::table('rel__contratovsprocedimientos')->where([
                    ['procedimiento_id',  $idp],
                    ['contrato_id', $request->contrato_id]
                ])->count();

                if ($count > 0) {
                    DB::table('rel__contratovsprocedimientos')
                        ->where([
                            ['procedimiento_id',  $idp],
                            ['contrato_id', $request->contrato_id]
                        ])->update(
                            [
                                'procedimiento_id' => $idp,
                                'valor' => $valor_particular,
                                'contrato_id' => $request->contrato_id

                            ]
                        );
                } else {
                    DB::table('rel__contratovsprocedimientos')
                        ->insert(
                            [
                                'procedimiento_id' => $idp,
                                'valor' => $valor_particular,
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

                $count = DB::table('rel__contratovsprocedimientos')->where([
                    ['contrato_id', $idp],
                    ['procedimiento_id', $request->procedimiento_id]
                ])->count();

                if ($count > 0) {
                    DB::table('rel__contratovsprocedimientos')
                        ->where([
                            ['contrato_id', $idp],
                            ['procedimiento_id', $request->procedimiento_id]
                        ])->update(
                            [
                                'contrato_id' => $idp,
                                'procedimiento_id' => $request->procedimiento_id

                            ]
                        );
                } else {
                    DB::table('rel__contratovsprocedimientos')
                        ->insert(
                            [

                                'contrato_id' => $idp,
                                'procedimiento_id' => $request->procedimiento_id


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

            // $data = rel__contratovsprocedimientos::where('id_contratovsprocedimiento', $id)->first();
            $data = DB::table('rel__contratovsprocedimientos')
                ->Join('def__contratos', 'rel__contratovsprocedimientos.contrato_id', '=', 'def__contratos.id_contrato')
                ->Join('def__procedimientos', 'rel__contratovsprocedimientos.procedimiento_id', '=', 'def__procedimientos.id_cups')
                ->select(
                    'rel__contratovsprocedimientos.id_contratovsprocedimiento as idd',
                    'def__contratos.contrato as contrato',
                    'def__contratos.nombre as nombre_c',
                    'rel__contratovsprocedimientos.valor as precio',
                    'def__procedimientos.cod_cups as cups',
                    'def__procedimientos.nombre as Procedimiento'
                )
                ->where('rel__contratovsprocedimientos.id_contratovsprocedimiento', '=', $id)
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

        $data = DB::table('rel__contratovsprocedimientos')->where('id_contratovsprocedimiento', '=', $id)
            ->update([
                'valor' => $request->valor,
                'updated_at' => now()
            ]);
        //$data->update($request->all());
        return response()->json(['success' => 'ok1']);
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

            // rel__contratovsprocedimientos::where('id_contratovsprocedimiento', $id)->delete();

            $datasp = DB::table('rel__contratovsprocedimientos')
                ->where('id_contratovsprocedimiento', '=', $id)
                ->delete();

            return response()->json(['success' => 'ok9']);
        }
    }
}
