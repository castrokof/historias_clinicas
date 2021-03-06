<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Models\Admin\Eps_empresa;
use App\Models\Admin\Eps_copago;
use App\Models\Admin\Eps_niveles;
use App\Models\Admin\Paciente;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Factura;
use App\Models\Admin\Paises;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $usuario_id = $request->session()->get('usuario_id');
        if ($request->ajax()) {
            $datas = Factura::orderBy('id_factura')
                ->get();

            return  DataTables()->of($datas)
                ->addColumn('action', function ($datas) {
                    $button = '<button type="button" name="edit" id="' . $datas->id_factura . '"
        class = "edit btn-float  bg-gradient-primary btn-sm tooltipsC"  title="Editar paciente"><i class="far fa-edit"></i></button>';

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.factura.index');
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectpa(Request $request)
    {

        $pacientes1 = [];

        if ($request->has('q')) {

            $term = $request->get('q');
            $pacientes1 = Paciente::orderBy('id_paciente')
                //->where([['documento', '=', $term->documento]])
                ->where('pnombre', 'LIKE', '%' . $term . '%')
                ->orwhere('papellido', 'LIKE', '%' . $term . '%')
                ->orwhere('documento', 'LIKE', '%' . $term . '%')
                ->get();
            return response()->json($pacientes1);
        }
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
     * @param  \App\Models\Admin\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show(Factura $factura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        if (request()->ajax()) {

            $data = Paciente::where('id_paciente', $id)->first();

            return response()->json(['result' => $data]);
        }
        return view('admin.paciente.index');
    }


    public function buscarp(Request $request)
    {
        $usuario_id = $request->session()->get('usuario_id');
        $fechaActual= Carbon::now()->toDateString()." 00:00:01";

        $paises = Paises::orderBy('id_pais')->select('id_pais', 'cod_pais', 'nombre',DB::raw("nombre as pais"))->get();

        if (request()->ajax()) {

            /* $data = Paciente::where('documento', $request->document)->first(); */
            $data = DB::table('paciente') 
            ->Join('paises','paciente.pais_id','=','paises.id_pais')
            /* ->select(DB::raw('paises.nombre as pais'),'paciente.documento as documento',) */
            ->where('paciente.documento', $request->document)
            ->first();

            return response()->json(['pacientes' => $data]);
        }

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Factura $factura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Factura $factura)
    {
        //
    }
}
