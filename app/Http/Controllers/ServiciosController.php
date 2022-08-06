<?php

namespace App\Http\Controllers;

use App\Models\Admin\Servicios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ServiciosController extends Controller
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
            $datas = Servicios::orderBy('id_servicio')
                ->get();

            return  DataTables()->of($datas)
                ->addColumn('action', function ($datas) {
                    $button = '<button type="button" name="edit" id="' . $datas->id_servicio . '"
        class = "edit btn-float  bg-gradient-primary btn-sm tooltipsC"  title="Editar servicio"><i class="far fa-edit"></i></button>';

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.financiero.servicios.index');
    }

    public function rel_index(Request $request)
    {

        if ($request->ajax()) {

            $datas = Servicios::orderBy('id_servicio', 'asc')->get();

            return  DataTables()->of($datas)
                ->addColumn('action', function ($datas) {
                    $button = '<button type="button" name="Detalle" id="' . $datas->id_servicio . '" class="listasDetalleAll btn btn-app bg-success tooltipsC" title="Relacionar Item"  ><span class="badge bg-teal">Detalle</span><i class="fas fa-list-ul"></i>Relaciones</button>';

                    return $button;
                })->addColumn('estado', function ($datas) {

                    if ($datas->estado == "1") {

                        $button = '
                 <div class="custom-control custom-switch ">
                 <input type="checkbox"  class="check_98 custom-control-input"  id="customSwitch99' . $datas->id_servicio . '" value="' . $datas->id_servicio . '"  checked>
                 <label class="custom-control-label" for="customSwitch99' . $datas->id_servicio . '"  valueid="' . $datas->id_servicio . '"></label>
                 </div>';
                    } else {

                        $button = '
                 <div class="custom-control custom-switch ">
                 <input type="checkbox" class="check_98 custom-control-input" id="customSwitch99' . $datas->id_servicio . '" value="' . $datas->id_servicio . '" >
                 <label class="custom-control-label" for="customSwitch99' . $datas->id_servicio . '"  valueid="' . $datas->id_servicio . '"></label>
                 </div>';
                    }

                    return $button;
                })
                ->rawColumns(['action', 'estado'])
                ->make(true);
        }

        return view('admin.financiero.procedimientos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        $rules = array(
            'cod_servicio'  => 'required|max:10',
            'nombre'  => 'required|max:200',
            'estado'  => 'required'
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {

            return response()->json(['errors' => $error->errors()->all()]);
        }

        Servicios::create($request->all());
        return response()->json(['success' => 'ok']);
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
     * @param  \App\Models\Admin\Servicios  $servicios
     * @return \Illuminate\Http\Response
     */
    public function show(Servicios $servicios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Servicios  $servicios
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        if (request()->ajax()) {

            $data = Servicios::where('id_servicio', $id)->first();

            return response()->json(['result' => $data]);
        }
        return view('admin.financiero.servicios.index');
    }

    public function actualizar(Request $request, $id)
    {
        $rules = array(
            'cod_servicio'  => 'required|max:10',
            'nombre'  => 'required|max:200',
            'estado'  => 'required'
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $data = DB::table('servicios')->where('id_servicio', '=', $id)
            ->update([
                'cod_servicio' => $request->cod_servicio,
                'nombre' => $request->nombre,
                'estado' => $request->estado,
                'updated_at' => now()
            ]);
        //$data->update($request->all());
        return response()->json(['success' => 'ok1']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Servicios  $servicios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servicios $servicios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Servicios  $servicios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicios $servicios)
    {
        //
    }
}
