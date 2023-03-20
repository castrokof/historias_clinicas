<?php

namespace App\Http\Controllers;

use App\Models\Admin\Fc_Factura_Procedimientos;
use App\Models\Admin\Factura;
use App\Models\Admin\Servicios;
use App\Models\Admin\Def_Profesionales;
use App\Models\Admin\Def_Procedimientos;
use App\Models\Admin\Def_Contratos;
use App\Models\Admin\Def_MedicamentosSuministros;
use App\Models\Admin\def__documentos_consecutivo;
use App\Models\Admin\Eps_empresa;
use App\Models\Admin\Eps_copago;
use App\Models\Admin\Eps_niveles;
use App\Models\Admin\Paciente;
use App\Models\Admin\Paises;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;

class FcFacturaProcedimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    //Funcion para seleccionar el Servicio y agregarlo en la factura
    public function selectservicio(Request $request)
    {
        $servf = [];

        if ($request->has('q')) {

            $term = $request->get('q');
            $servf = Servicios::orderBy('id_servicio')
                ->where('cod_servicio', 'LIKE', '%' . $term . '%')
                ->orwhere('nombre', 'LIKE', '%' . $term . '%')
                ->get();
            return response()->json($servf);
        } else {
            $term = $request->get('q');
            $servf = Servicios::orderBy('id_servicio')->get();
            return response()->json($servf);
        }
    }

    //Funcion para seleccionar el Profesional y agregarlo en la factura
    public function selectprof(Request $request)
    {
        $servf = [];

        if ($request->has('q')) {

            $term = $request->get('q');
            $servf = Def_Profesionales::orderBy('id_profesional')
                ->where('codigo', 'LIKE', '%' . $term . '%')
                ->orwhere('nombre', 'LIKE', '%' . $term . '%')
                ->get();
            return response()->json($servf);
        } else {
            $term = $request->get('q');
            $servf = Def_Profesionales::orderBy('id_profesional')->get();
            return response()->json($servf);
        }
    }

    //Funcion para seleccionar el Procedimiento y agregarlo en la factura
    public function selectcups(Request $request)
    {
        $servf = [];

        if ($request->has('q')) {

            $term = $request->get('q');
            $servf = Def_Procedimientos::orderBy('id_cups')
                ->where('cod_cups', 'LIKE', '%' . $term . '%')
                ->orwhere('nombre', 'LIKE', '%' . $term . '%')
                ->get();
            return response()->json($servf);
        } else {
            $term = $request->get('q');
            $servf = Def_Procedimientos::orderBy('id_cups')->get();
            return response()->json($servf);
        }
    }

    //Funcion para seleccionar el Contrato y agregarlo en la factura
    public function selectcont(Request $request)
    {
        $servf = [];

        if ($request->has('q')) {

            $term = $request->get('q');
            $servf = Def_Contratos::orderBy('id_contrato')
                ->where('contrato', 'LIKE', '%' . $term . '%')
                ->orwhere('nombre', 'LIKE', '%' . $term . '%')
                ->get();
            return response()->json($servf);
        } else {
            $term = $request->get('q');
            $servf = Def_Contratos::orderBy('id_contrato')->get();
            return response()->json($servf);
        }
    }

    //Función para seleccionar el Medicamento y agregarlo en la factura
    public function selectmed(Request $request)
    {
        $medfac = [];

        if ($request->has('q')) {

            $term = $request->get('q');
            $medfac = Def_MedicamentosSuministros::orderBy('id_medicamento')
                ->where('codigo', 'LIKE', '%' . $term . '%')
                ->orwhere('nombre', 'LIKE', '%' . $term . '%')
                ->get();
            return response()->json($medfac);
        } else {
            $term = $request->get('q');
            $medfac = Def_MedicamentosSuministros::orderBy('id_medicamento')->get();
            return response()->json($medfac);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getValorParticularCups(Request $request)
    {
        $id_cups = $request->input('id_cups');

        $data = Def_Procedimientos::where('id_cups', $id_cups)->first();

        return response()->json([
            'valor_particular' => $data->valor_particular
        ]);
    }
    public function getValorParticularMed(Request $request)
    {
        $id_medicamento = $request->input('id_medicamento');

        $data = Def_MedicamentosSuministros::where('id_medicamento', $id_medicamento)->first();

        return response()->json([
            'valor_particular' => $data->valor_particular
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Fc_Factura_Procedimientos  $fc_Factura_Procedimientos
     * @return \Illuminate\Http\Response
     */
    public function show(Fc_Factura_Procedimientos $fc_Factura_Procedimientos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Fc_Factura_Procedimientos  $fc_Factura_Procedimientos
     * @return \Illuminate\Http\Response
     */
    public function edit(Fc_Factura_Procedimientos $fc_Factura_Procedimientos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Fc_Factura_Procedimientos  $fc_Factura_Procedimientos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fc_Factura_Procedimientos $fc_Factura_Procedimientos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Fc_Factura_Procedimientos  $fc_Factura_Procedimientos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fc_Factura_Procedimientos $fc_Factura_Procedimientos)
    {
        //
    }
}
