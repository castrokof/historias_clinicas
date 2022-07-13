<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Cliente;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Yajra\DataTables\DataTables;



class AdminController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $fechaAi= Carbon::now()->toDateString()." 00:00:01";
        $fechaAf= Carbon::now()->toDateString()." 23:59:59";


        $fecha_Actual = Carbon::now();
        $fecha_Actual = $fecha_Actual->Format('Y-m-d');
        
        $empleado_id = $request->session()->get('empleado_id');
        $usuario_id = $request->session()->get('usuario_id');

        $empresaLogin = DB::table('empleado')->Join('empresa', 'empleado.empresa_id', '=', 'empresa.id')
        ->where('empleado.ide', '=', $empleado_id)->first();
        
        $clientes = Cliente::where('usuario_id', '=', $usuario_id )->get();

        $datas = DB::table('prestamo')
        ->Join('cliente', 'prestamo.cliente_id', '=', 'cliente.id')
        ->Join('detalle_prestamo', 'prestamo.idp', '=', 'detalle_prestamo.prestamo_id')
        ->where([['prestamo.usuario_id', '=', $usuario_id], ['detalle_prestamo.fecha_cuota', '=', $fecha_Actual]])
        ->select(DB::raw('SUM(detalle_prestamo.valor_cuota) as cobro'),
                 DB::raw('SUM(CASE WHEN detalle_prestamo.estado != 1 THEN 1 ELSE 0 END) as cobros'),
                 DB::raw('SUM(CASE WHEN detalle_prestamo.estado = "C" THEN 1 ELSE 0 END) as pendiente_cobros'),
                 DB::raw('SUM(CASE WHEN detalle_prestamo.estado = "P" THEN 1 ELSE 0 END) as pagados'),
                 DB::raw('SUM(CASE WHEN detalle_prestamo.estado = "A" THEN 1 ELSE 0 END) as atrasos')
        )
        ->get();

        
        $dataa = DB::table('prestamo')
        ->Join('cliente', 'prestamo.cliente_id', '=', 'cliente.id')
        ->Join('detalle_prestamo', 'prestamo.idp', '=', 'detalle_prestamo.prestamo_id')
        ->where([['prestamo.usuario_id', '=', $usuario_id], ['detalle_prestamo.estado', '=', "A"]])
        ->whereBetween('detalle_prestamo.updated_at', [$fechaAi, $fechaAf])
        ->select(DB::raw('sum(detalle_prestamo.valor_cuota) as atrasado'))
        ->get();

        $data = DB::table('prestamo')
        ->Join('cliente', 'prestamo.cliente_id', '=', 'cliente.id')
        ->Join('pago', 'prestamo.idp', '=', 'pago.prestamo_id')
        ->where('prestamo.usuario_id', '=', $usuario_id)
        ->whereBetween('pago.updated_at', [$fechaAi, $fechaAf])
        ->select(DB::raw('sum(pago.valor_abono) as cobrado'))
        ->get();
        

        $datast = DB::table('usuario')
        ->Join('empleado', 'usuario.empleado_id', '=', 'empleado.ide')
        ->Join('prestamo', 'prestamo.usuario_id', '=', 'usuario.id')
        ->Join('usuario_rol', 'usuario.id', '=', 'usuario_rol.usuario_id')
        ->Join('detalle_prestamo', 'detalle_prestamo.prestamo_id', '=', 'prestamo.idp')
        ->where([['empleado.empresa_id', '=',$empresaLogin->empresa_id],  ['usuario_rol.rol_id', '=', 3], ['detalle_prestamo.fecha_cuota', '<=', $fecha_Actual]])
        ->select(DB::raw('SUM(detalle_prestamo.valor_cuota) as cobro'),
                 DB::raw('SUM(CASE WHEN detalle_prestamo.estado != 1 THEN 1 ELSE 0 END) as cobros'),
                 DB::raw('SUM(CASE WHEN detalle_prestamo.estado = "C" THEN 1 ELSE 0 END) as pendiente_cobros'),
                 DB::raw('SUM(CASE WHEN detalle_prestamo.estado = "P" THEN 1 ELSE 0 END) as pagados'),
                 DB::raw('SUM(CASE WHEN detalle_prestamo.estado = "A" THEN 1 ELSE 0 END) as atrasos'))
        ->get();

        
         
        return view('admin.admin.index', compact('datas', 'data', 'datast', 'dataa')); 

// -----------------------------------------------------------------------------
       
      
      
    
   
    }
   

    public function informes(Request $request)
    {  

        $fechaAi= Carbon::now()->toDateString()." 00:00:01";
        $fechaAf= Carbon::now()->toDateString()." 23:59:59";


        $fecha_Actual = Carbon::now();
        $fecha_Actual = $fecha_Actual->Format('Y-m-d');
        
        $empleado_id = $request->session()->get('empleado_id');
        $usuario_id = $request->session()->get('usuario_id');

        $empresaLogin = DB::table('empleado')->Join('empresa', 'empleado.empresa_id', '=', 'empresa.id')
        ->where('empleado.ide', '=', $empleado_id)->first();
        
        $clientes = Cliente::where('usuario_id', '=', $usuario_id )->get();

        $datas = DB::table('prestamo')
        ->Join('cliente', 'prestamo.cliente_id', '=', 'cliente.id')
        ->Join('detalle_prestamo', 'prestamo.idp', '=', 'detalle_prestamo.prestamo_id')
        ->where([['prestamo.usuario_id', '=', $usuario_id], ['detalle_prestamo.fecha_cuota', '=', $fecha_Actual]])
        ->select(DB::raw('SUM(detalle_prestamo.valor_cuota) as cobro'),
                 DB::raw('SUM(CASE WHEN detalle_prestamo.estado != 1 THEN 1 ELSE 0 END) as cobros'),
                 DB::raw('SUM(CASE WHEN detalle_prestamo.estado = "C" THEN 1 ELSE 0 END) as pendiente_cobros'),
                 DB::raw('SUM(CASE WHEN detalle_prestamo.estado = "P" THEN 1 ELSE 0 END) as pagados'),
                 DB::raw('SUM(CASE WHEN detalle_prestamo.estado = "A" THEN 1 ELSE 0 END) as atrasos')
        )
        ->get();

        
        $dataa = DB::table('prestamo')
        ->Join('cliente', 'prestamo.cliente_id', '=', 'cliente.id')
        ->Join('detalle_prestamo', 'prestamo.idp', '=', 'detalle_prestamo.prestamo_id')
        ->where([['prestamo.usuario_id', '=', $usuario_id], ['detalle_prestamo.estado', '=', "A"]])
        ->whereBetween('detalle_prestamo.updated_at', [$fechaAi, $fechaAf])
        ->select(DB::raw('sum(detalle_prestamo.valor_cuota) as atrasado'))
        ->get();

        $data = DB::table('prestamo')
        ->Join('cliente', 'prestamo.cliente_id', '=', 'cliente.id')
        ->Join('pago', 'prestamo.idp', '=', 'pago.prestamo_id')
        ->where('prestamo.usuario_id', '=', $usuario_id)
        ->whereBetween('pago.updated_at', [$fechaAi, $fechaAf])
        ->select(DB::raw('sum(pago.valor_abono) as cobrado'))
        ->get();
        

        $datast = DB::table('usuario')
        ->Join('empleado', 'usuario.empleado_id', '=', 'empleado.ide')
        ->Join('prestamo', 'prestamo.usuario_id', '=', 'usuario.id')
        ->Join('usuario_rol', 'usuario.id', '=', 'usuario_rol.usuario_id')
        ->Join('detalle_prestamo', 'detalle_prestamo.prestamo_id', '=', 'prestamo.idp')
        ->where([['empleado.empresa_id', '=',$empresaLogin->empresa_id],  ['usuario_rol.rol_id', '=', 3], ['detalle_prestamo.fecha_cuota', '<=', $fecha_Actual]])
        ->select(DB::raw('SUM(detalle_prestamo.valor_cuota) as cobro'),
                 DB::raw('SUM(CASE WHEN detalle_prestamo.estado != 1 THEN 1 ELSE 0 END) as cobros'),
                 DB::raw('SUM(CASE WHEN detalle_prestamo.estado = "C" THEN 1 ELSE 0 END) as pendiente_cobros'),
                 DB::raw('SUM(CASE WHEN detalle_prestamo.estado = "P" THEN 1 ELSE 0 END) as pagados'),
                 DB::raw('SUM(CASE WHEN detalle_prestamo.estado = "A" THEN 1 ELSE 0 END) as atrasos'))
        ->get();
   
        return view('admin.admin.informes', compact('datas', 'data', 'datast', 'dataa'));  

    }    


}
