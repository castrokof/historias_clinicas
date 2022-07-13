<?php

namespace App\Http\Controllers;

use App\Models\Admin\Cliente;
use App\Models\Admin\Empleado;
use App\Models\Seguridad\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
         $id_usuario = Session()->get('usuario_id');
         
         $usuarios = Usuario::orderBy('id')->where('id', '=', $id_usuario)->pluck('usuario', 'id')->toArray();

       

        if($request->ajax()){

          

            $datas = Cliente::where('usuario_id', '=', $id_usuario)->orderBy('usuario_id')->orderBy('consecutivo')->get();
            return  DataTables()->of($datas)
            // ->addColumn('editar', '<a href="{{url("cliente/$id/editar")}}" class="btn-accion-tabla tooltipsC" title="Editar este cliente">
            //       <i class="fa fa-fw fa-pencil-alt"></i>
            //     </a>')
            ->addColumn('action', function($datas){
          $button = '<button type="button" name="edit" id="'.$datas->id.'"
          class = "edit btn-float  bg-gradient-primary btn-sm tooltipsC"  title="Editar Cliente"><i class="far fa-edit"></i></button>';
          $button .='&nbsp;<button type="button" name="prestamo" id="'.$datas->id.'"
          class = "prestamo btn-float  bg-gradient-warning btn-sm tooltipsC" title="Agregar Prestamo"><i class="fa fa-fw fa-plus-circle"></i><i class="fas fa-money-bill-alt"></i></button>';
          $button .='&nbsp;<button type="button" name="detalle" id="'.$datas->id.'"
          class = "detalle btn-float  bg-gradient-success btn-sm tooltipsC" title="Detalle de Prestamos"><i class="fas fa-atlas"></i></i></button>';
          return $button;

            }) 
            ->rawColumns(['action'])
            ->make(true);
            } 
        return view('admin.cliente.index', compact('usuarios', 'datas'));
        
    }

    public function indexcli(Request $request)
    {
        
         $id_usuario = Session()->get('usuario_id');
         
         $usuarios = Usuario::orderBy('id')->where('id', '=', $id_usuario)->pluck('usuario', 'id')->toArray();

        $id_empleados = $request->id;

        if($request->ajax()){

           if($id_empleados != 0 || $id_empleados != null){

             $datas = DB::table('usuario')
            ->Join('empleado', 'usuario.empleado_id', '=', 'empleado.ide')
            ->Join('cliente', 'usuario.id', '=', 'cliente.usuario_id')
            ->where('empleado.ide', '=', $id_empleados)
            ->get();
            return  DataTables()->of($datas)
            //   ->addColumn('action', function($datas){
            //   $button = '<button type="button" name="edit" id="'.$datas->id.'"
            //   class = "edit btn-float  bg-gradient-primary btn-sm tooltipsC"  title="Editar Cliente"><i class="far fa-edit"></i></button>';
            //   $button .='&nbsp;<button type="button" name="prestamo" id="'.$datas->id.'"
            //   class = "prestamo btn-float  bg-gradient-warning btn-sm tooltipsC" title="Agregar Prestamo"><i class="fa fa-fw fa-plus-circle"></i><i class="fas fa-money-bill-alt"></i></button>';
            //   $button .='&nbsp;<button type="button" name="detalle" id="'.$datas->id.'"
            //   class = "detalle btn-float  bg-gradient-success btn-sm tooltipsC" title="Detalle de Prestamos"><i class="fas fa-atlas"></i></i></button>';
            //   return $button;
    
            //     }) 
                //->rawColumns(['action'])
                ->make(true);
            }else{
                $datas = DB::table('usuario')
                ->Join('empleado', 'usuario.empleado_id', '=', 'empleado.ide')
                ->Join('cliente', 'usuario.id', '=', 'cliente.usuario_id')
                ->where('empleado.ide', '=', $id_empleados)
                ->get();
                return  DataTables()->of($datas)
                ->make(true);

            }


        return view('admin.empleado.index', compact('usuarios', 'datas'));
        }
    }
    public function indexCliente(Request $request, $id)
    {
        
         $id_empleado = $id;
         
         
         $id_usuarios = Usuario::where('empleado_id','=', $id_empleado)->first();
         $id_usuario = $id_usuarios->id;
         $usuarios = Usuario::orderBy('id')->where('id', '=', $id_usuario)->pluck('usuario', 'id')->toArray();
         
            
        if($request->ajax()){

            $datas = Cliente::where('usuario_id', '=', $id_usuario)->orderBy('usuario_id')->orderBy('consecutivo')->get();
            return  DataTables()->of($datas)
            ->addColumn('action', function($datas){
          $button = '<button type="button" name="edit" id="'.$datas->id.'"
          class = "edit btn-float  bg-gradient-primary btn-sm tooltipsC"  title="Editar Cliente"><i class="far fa-edit"></i></button>';
          $button .='&nbsp;<button type="button" name="prestamo" id="'.$datas->id.'"
          class = "prestamo btn-float  bg-gradient-warning btn-sm tooltipsC" title="Agregar Prestamo"><i class="fa fa-fw fa-plus-circle"></i><i class="fas fa-money-bill-alt"></i></button>';
          $button .='&nbsp;<button type="button" name="detalle" id="'.$datas->id.'"
          class = "detalle btn-float  bg-gradient-success btn-sm tooltipsC" title="Detalle de Prestamos"><i class="fas fa-atlas"></i></i></button>';
          return $button;

            }) 
            ->rawColumns(['action'])
            ->make(true);
            }
        return view('admin.cliente.index', compact('usuarios', 'datas'));
    }

    public function ruta()
    {
        
         $id_usuario = Session()->get('usuario_id');
         $datas = Cliente::where('usuario_id', '=', $id_usuario)->orderBy('usuario_id')->orderBy('consecutivo')->get();
           
        return view('admin.cliente.ruta.index', compact('datas'));  
    }

    public function rutaGuardar()
    {
        
         $id_usuario = Session()->get('usuario_id');
         $datas = Cliente::where('usuario_id', '=', $id_usuario)->orderBy('usuario_id')->orderBy('consecutivo')->get();
         $itemId = Input::get('itemId');
         $itemConsecutivo = Input::get('itemConsecutivo');
         foreach ($datas as $item) {
            return Cliente::where('id', '=', $itemId)
            ->update(array('consecutivo' => $itemConsecutivo));
         }
        
    }

    /**
     * Show the form for creating a new resource.
     *s
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        $rules = array(
            'nombres'  => 'required|max:100',
            'apellidos'  => 'required|max:100',
            'documento' => 'numeric|required|min:10000|max:9999999999',
            'celular' => 'numeric|required|min:10000|max:9999999999',
            'tipo_documento' => 'required',
            'usuario_id' => 'required',
            'ciudad' => 'required',
            'pais' => 'required',
            'estado' => 'required',
            'direccion' => 'required',
            'consecutivo' => 'numeric|required|min:1|max:9999999999',
            'activo' => 'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        
        Cliente::create($request->all());
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function editar($id)
    // {
    //         $id_usuario = Session()->get('usuario_id');
         
    //         $usuarios = Usuario::orderBy('id')->where('id', '=', $id_usuario)->pluck('usuario', 'id')->toArray();
            
    //         $data = Cliente::findOrFail($id);
      
       
    //     return view('admin.cliente.editar', compact('data','usuarios'));
    // }

    public function editar($id)
    {
        $id_usuario = Session()->get('usuario_id');
         
       $usuarios = Usuario::orderBy('id')->where('id', '=', $id_usuario)->pluck('usuario', 'id')->toArray();

        if(request()->ajax()){
        $data = Cliente::findOrFail($id);
            return response()->json(['result'=>$data]);

        }
        return view('admin.cliente.index', compact('usuarios'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, $id)
    {
        $rules = array(
            'nombres'  => 'required|max:100',
            'apellidos'  => 'required|max:100',
            'documento' => 'numeric|required|min:10000|max:9999999999',
            'celular' => 'numeric|required|min:10000|max:9999999999',
            'tipo_documento' => 'required',
            'usuario_id' => 'required',
            'ciudad' => 'required',
            'pais' => 'required',
            'estado' => 'required',
            'direccion' => 'required',
            'consecutivo' => 'numeric|required|min:1|max:9999999999',
            'activo' => 'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
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
