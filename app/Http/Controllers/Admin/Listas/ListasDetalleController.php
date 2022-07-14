<?php

namespace App\Http\Controllers\Paliativos\Listas;

use App\Models\Listas\ListasDetalle;
use App\Http\Controllers\Controller;
use App\Models\ListasDetalle\ListasDetalle as ListasDetalleListasDetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ListasDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexDetalle(Request $request)
    {

        $idlist = $request->id;

         if ($request->ajax()) {

            if ($idlist != null) {

                $datas = ListasDetalle::orderBy('id', 'asc')
                ->where('listas_id', "=", $idlist)->get();

            return  DataTables()->of($datas)
                ->addColumn('action', function ($datas) {
                    $button = '<button type="button" name="Detalle" id="' . $datas->id . '" class="itemsEditar btn btn-app bg-warning tooltipsC" title="Editar"  ><span class="badge bg-teal">Editar</span><i class="fas fa-edit"></i>Editar</button>';

                    return $button;
                })->addColumn('activo', function ($datas) {


                    if ($datas->activo == "SI") {


                        $button = '
             <div class="custom-control custom-switch ">
             <input type="checkbox"  class="check_99 custom-control-input"  id="customSwitch999' . $datas->id . '" value="' . $datas->id . '"  checked>
             <label class="custom-control-label" for="customSwitch999' . $datas->id . '"  valueid="' . $datas->id . '"></label>
             </div>';
                    } else {

                        $button = '
             <div class="custom-control custom-switch ">
             <input type="checkbox" class="check_99 custom-control-input" id="customSwitch999' . $datas->id . '" value="' . $datas->id . '" >
             <label class="custom-control-label" for="customSwitch999' . $datas->id . '"  valueid="' . $datas->id . '"></label>
             </div>';
                    }

                    return $button;
                })
                ->rawColumns(['action', 'activo'])
                ->make(true);


            } else {

                $datas = ListasDetalle::orderBy('id', 'asc')
                ->where('listas_id', '=', null)->get();
                return  DataTables()->of($datas)
                        ->make(true);;

            }
        }


        return view('paliativos.listas.index');
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
        if ($request->ajax()) {

            $rules = array(
                'slug' => 'required',
                'nombre' => 'required',
                'activo' => 'required',
                'user_id' => 'required',
                'listas_id' => 'required'
            );

            $error = Validator::make($request->all(), $rules);

            if ($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            ListasDetalle::create($request->all());

            return response()->json(['success' => 'ok']);
        }
    }
    public function select()
    {
        if(request()->ajax())
        {
          $typeDocument=ListasDetalle::orderBy('slug')->where([
            ['listas_id', 5],
            ['activo', 'SI'],])->get();
            $state=ListasDetalle::orderBy('slug')->where([
                ['listas_id', 6],
                ['activo', 'SI'],])->get();
                $type=ListasDetalle::orderBy('id')->where([
                    ['listas_id', 4],
                    ['activo', 'SI'],])->get();
            return response()->json([$typeDocument, $state, $type]);
        }
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

    public function updateestado(Request $request)
    {

            if ($request->ajax()) {

                $listaactivo = new ListasDetalle();

                $datas = DB::table('listasdetalle')->select('activo')->where('id',$request->input('id'))->first();



                foreach($datas as $data){

                  if($data == 'SI'){

                    $listaactivo->findOrFail($request->input('id'))->update([
                        'activo' =>'NO'
                    ]);

                    return response()->json(['respuesta' => 'Item desactivado correctamente', 'titulo' => 'System Fidem', 'icon' => 'info']);
                    }else if($data == 'NO'){
                        $listaactivo->findOrFail($request->input('id'))->update([
                            'activo' => 'SI'
                        ]);

                        return response()->json(['respuesta' => 'Item activado correctamente', 'titulo' => 'System Fidem', 'icon' => 'success']);

                    }

                }

            }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
