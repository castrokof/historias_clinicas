<?php

namespace App\Http\Controllers;

use App\Models\Admin\Def_Sedes;
use App\Models\Admin\Ciudades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DefSedesController extends Controller
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
            /* $datas = Def_Sedes::orderBy('id_sede')
                ->get(); */

                $datas = DB::table('def__sedes')
                ->Join('ciudades', 'def__sedes.ciudad_id', '=', 'ciudades.id_ciudad')
                ->select('*',
                    'def__sedes.id_sede as idd',
                    'ciudades.cod_ciudad as cod_ciudad',
                    'ciudades.nombre as nombre_ciudad'
                )
                // ->where('def__sedes.id_sede', '=', $idlist)
                ->orderBy('id_sede')
                ->get();

            return  DataTables()->of($datas)
                ->addColumn('action', function ($datas) {
                    $button = '<button type="button" name="edit" id="' . $datas->id_sede . '"
        class = "edit btn-float  bg-gradient-primary btn-sm tooltipsC"  title="Editar"><i class="far fa-edit"></i></button>';

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.parametros.sedes.index');
    }

    public function guardar(Request $request)
    {
        $rules = array(
            'cod_sede'  => 'required|max:10',
            'sede'  => 'required|max:200',
            'direccion' => 'required|max:250',
            'telefono' => 'required|max:20',
            'email' => 'required|max:250',
            'ciudad_id' => 'required',
            'logo' ,
            'estado'  => 'required'
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {

            return response()->json(['errors' => $error->errors()->all()]);
        }

        Def_Sedes::create($request->all());
        return response()->json(['success' => 'ok']);
    }

    public function editar($id)
    {
        if (request()->ajax()) {

            $data = Def_Sedes::where('id_sede', $id)->first();

            return response()->json(['result' => $data]);
        }
        return view('admin.parametros.sedes.index');
    }

    public function actualizar(Request $request, $id)
    {
        $rules = array(
            'cod_sede'  => 'required|max:10',
            'sede'  => 'required|max:200',
            'direccion' => 'required|max:250',
            'telefono' => 'required|max:20',
            'email' => 'required|max:250',
            'ciudad_id' => 'required',
            'logo',
            'estado'  => 'required'
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $data = DB::table('def__sedes')->where('id_sede', '=', $id)
            ->update([
                'cod_sede' => $request->cod_sede,
                'sede' => $request->sede,
                'direccion' => $request->direccion,
                'telefono' => $request->telefono,
                'email' => $request->email,
                'ciudad_id' => $request->ciudad_id,
                'logo'=> $request->logo,
                'estado' => $request->estado,
                'updated_at' => now()
            ]);
        //$data->update($request->all());
        return response()->json(['success' => 'ok1']);
    }

    //Funcion para seleccionar el Ciudad desde la tabla ciudades
    public function selectci(Request $request)
    {
        $ciudadp = [];

        if ($request->has('q')) {

            $term = $request->get('q');
            $ciudadp = Ciudades::orderBy('id_ciudad')
                ->where('cod_ciudad', 'LIKE', '%' . $term . '%')
                ->orwhere('nombre', 'LIKE', '%'.$term .'%')
                ->get();
            return response()->json($ciudadp);
        } else {
            $term = $request->get('q');
            $ciudadp = Ciudades::orderBy('id_ciudad')->get();
            return response()->json($ciudadp);
        }
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Def_Sedes  $def_Sedes
     * @return \Illuminate\Http\Response
     */
    public function show(Def_Sedes $def_Sedes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Def_Sedes  $def_Sedes
     * @return \Illuminate\Http\Response
     */
    public function edit(Def_Sedes $def_Sedes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Def_Sedes  $def_Sedes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Def_Sedes $def_Sedes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Def_Sedes  $def_Sedes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Def_Sedes $def_Sedes)
    {
        //
    }
}
