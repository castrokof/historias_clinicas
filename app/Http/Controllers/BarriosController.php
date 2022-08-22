<?php

namespace App\Http\Controllers;

use App\Models\Admin\Barrios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BarriosController extends Controller
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
            $datas = Barrios::orderBy('id_barrio')
                ->get();

            return  DataTables()->of($datas)
                ->addColumn('action', function ($datas) {
                    $button = '<button type="button" name="edit" id="' . $datas->id_barrio . '"
        class = "edit btn-float  bg-gradient-primary btn-sm tooltipsC"  title="Editar"><i class="far fa-edit"></i></button>';

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.parametros.barrios.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        $rules = array(
            'cod_barrio'  => 'required|max:10',
            'nombre'  => 'required|max:200',
            'estado'  => 'required'
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {

            return response()->json(['errors' => $error->errors()->all()]);
        }

        Barrios::create($request->all());
        return response()->json(['success' => 'ok']);
    }

    public function editar($id)
    {
        if (request()->ajax()) {

            $data = Barrios::where('id_barrio', $id)->first();

            return response()->json(['result' => $data]);
        }
        return view('admin.parametros.barrios.index');
    }

    public function actualizar(Request $request, $id)
    {
        $rules = array(
            'cod_barrio'  => 'required|max:10',
            'nombre'  => 'required|max:200',
            'estado'  => 'required'
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $data = DB::table('barrios')->where('id_barrio', '=', $id)
            ->update([
                'cod_barrio' => $request->cod_barrio,
                'nombre' => $request->nombre,
                'estado' => $request->estado,
                'updated_at' => now()
            ]);
        
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
     * @param  \App\Models\Admin\Barrios  $barrios
     * @return \Illuminate\Http\Response
     */
    public function show(Barrios $barrios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Barrios  $barrios
     * @return \Illuminate\Http\Response
     */
    public function edit(Barrios $barrios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Barrios  $barrios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barrios $barrios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Barrios  $barrios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barrios $barrios)
    {
        //
    }
}
