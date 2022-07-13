<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionArchivo;
use App\Http\Requests\ValidacionEmpresa;
use App\Models\Admin\Empresa;
use App\Models\Seguridad\Usuario;
use Illuminate\Support\Facades\Validator;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
           
        if($request->ajax()){

            $datas = Empresa::orderBy('id')->get();
            
            return  DataTables()->of($datas)
            // ->addColumn('editar', '<a href="{{url("admin/empresa/$id/editar")}}" class="btn-accion-tabla tooltipsC" title="Editar esta empresa">
            //       <i class="fa fa-fw fa-pencil-alt"></i>
            //     </a>')
            ->addColumn('editar', function($datas){
          $button = '<button type="button" name="edit" id="'.$datas->id.'"
          class ="edit btn btn-primary btn-sm">Editar</button>';
          return $button;

            }) 
            ->rawColumns(['editar'])
            ->make(true);
            }
        return view('admin.empresa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $button = '<button type="button" name="edit" id="'.$datas->id.'"
        // class"edit btn btn-primary btn-sm tooltipsC" title="Editar Empresa">Editar</button>';
        // return $button;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        $rules = array(
            'nombre'  => 'required|unique:empresa|max:100',
            'documento' => 'numeric|unique:empresa|required|min:10000|max:9999999999',
            'tipo_documento' => 'required',
            'activo' => 'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        
        Empresa::create($request->all());
            return response()->json(['success' => 'ok']);
        
    }
            
      
    
    // public function guardar(ValidacionArchivo $request)
    // {
        
    //     if($request->ajax()){
    //         Empresa::create($request->all());
    //         return response()->json(['respuesta' => 'ok']);
    //     }else{
    //         return response()->json(['respuesta' => 'ng']);
    //     }
            
    //     return view('admin.empresa.index');
    // }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    { 
        if(request()->ajax()){
        $data = Empresa::findOrFail($id);
        return response()->json(['result'=>$data]);
        
        }
        return view('admin.empresa.index', compact('data'));

    }

    // public function editar($id)
    // {
    //     if(request()->ajax()){
    //     $data = Empresa::findOrFail($id);
    //         return response()->json(['result'=>$data]);

    //     }
    //     return view('admin.empresa.editar');

    // }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
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
    // public function actualizar(ValidacionEmpresa $request, $id)
    // {   
    //     //dd($request);
    //     $usuario = Empresa::findOrFail($id);
    //     $usuario->update($request->all());
    //     return redirect('empresa')->with('mensaje', 'Empresa actualizada con exito!!');
    // }

    public function actualizar(Request $request)
    {   
        $rules = array(
            'tipo_documento' => 'required',
            'activo' => 'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $datas = Empresa::findOrFail($request->hidden_id);
        $datas->update($request->all());
        return response()->json(['success' => 'ok1']);
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
