<?php

namespace App\Http\Controllers;

use App\Models\Admin\Def_Documentos;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;

class DefDocumentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {


            $datas = Def_Documentos::orderBy('id_documento', 'asc')->get();
     
             return  DataTables()->of($datas)
                 ->addColumn('action', function($datas){
                    $button = '<button type="button" name="edit" id="' . $datas->id_documento . '"
                    class = "edit btn-float  bg-gradient-primary btn-sm tooltipsC"  title="Editar Documento"><i class="far fa-edit"></i></button>';
     
                 return $button;
     
             })->addColumn('estado', function($datas){
     
     
                 if ($datas->estado == "1") {
     
                 $button ='
                 <div class="custom-control custom-switch ">
                 <input type="checkbox"  class="check_98 custom-control-input"  id="customSwitch99'.$datas->id_documento.'" value="'.$datas->id_documento.'"  checked>
                 <label class="custom-control-label" for="customSwitch99'.$datas->id_documento.'"  valueid="'.$datas->id_documento.'"></label>
                 </div>';
     
             }else{
     
                 $button ='
                 <div class="custom-control custom-switch ">
                 <input type="checkbox" class="check_98 custom-control-input" id="customSwitch99'.$datas->id_documento.'" value="'.$datas->id_documento.'" >
                 <label class="custom-control-label" for="customSwitch99'.$datas->id_documento.'"  valueid="'.$datas->id_documento.'"></label>
                 </div>';
     
             }
     
             return $button;
     
         })
             ->rawColumns(['action', 'estado'])
             ->make(true);
     
         }
     
         return view('admin.financiero.documentos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {

        if ($request->ajax()) {

            $usuario_id = $request->session()->get('usuario_id');

            $rules = array(
                'cod_documentos'=> 'required',
                'nombre'=> 'required',
                'tipo_doc_id',
                'estado'
            );

            $error = Validator::make($request->all(), $rules);

            if ($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            Def_Documentos::create($request->all());

            return response()->json(['success' => 'ok']);
        }
    }

    public function updateestado(Request $request)
    {

            if ($request->ajax()) {

               
                $datas = DB::table('def__documentos')->select('estado')->where('id_documento', $request->input('id'))->first();

                foreach($datas as $data){

                  if($data == '1'){

                    DB::table('def__documentos')
                    ->where('id_documento',$request->input('id'))
                    ->update([
                     'estado' => '0'
                            ]);

                    return response()->json(['respuesta' => 'Documento desactivado', 'titulo' => 'Sistema de Historias Clínicas', 'icon' => 'warning']);
                    }else if($data == '0'){
                        DB::table('def__documentos')
                        ->where('id_documento',$request->input('id'))
                        ->update([
                         'estado' => '1'
                                ]);

                        return response()->json(['respuesta' => 'Documento activado correctamente', 'titulo' => 'Sistema de Historias Clínicas', 'icon' => 'warning']);

                    }
                }
            }
    }

    public function editar($id)
    {
        if (request()->ajax()) {

            $data = Def_Documentos::where('id_documento', $id)->first();

            return response()->json(['result' => $data]);
        }
        return view('admin.financiero.documentos.index');
    }

    //Funcion para seleccionar el Tipo de Documento
    public function selectdo(Request $request)
    {
        $tipodo = [];

        if ($request->has('q')) {

            $term = $request->get('q');

            $tipodo = DB::table('def__tipos_documentos')
                ->where('cod_tipos_documento', 'LIKE', '%' . $term . '%')
                ->orwhere('nombre', 'LIKE', '%'.$term .'%')
                ->get();

            return response()->json($tipodo);
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
     * @param  \App\Models\Admin\Def_Documentos  $documentos
     * @return \Illuminate\Http\Response
     */
    public function show(Def_Documentos $documentos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Def_Documentos  $documentos
     * @return \Illuminate\Http\Response
     */
    public function edit(Def_Documentos $documentos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Def_Documentos  $documentos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Def_Documentos $documentos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Def_Documentos  $documentos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Def_Documentos $documentos)
    {
        //
    }
}
