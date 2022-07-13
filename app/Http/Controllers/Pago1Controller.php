<?php

namespace app\Http\Controllers;

use App\Models\Admin\Cliente;
use App\Models\Admin\DetallePrestamo;
use App\Models\Admin\Pago;
use App\Models\Admin\Prestamo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Command\WhereamiCommand;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagos_registrados = $request->estado_pago;

        $prestamoc_id = $request->prestamoc_id;

        $fechaAi= Carbon::now()->toDateString()." 00:00:01";
        $fechaAf= Carbon::now()->toDateString()." 23:59:59";



        $fecha_Actual = Carbon::now();
        $fecha_Actual = $fecha_Actual->Format('Y-m-d');

        $usuario_id = $request->session()->get('usuario_id');

        $clientes = Cliente::where('usuario_id', '=', $usuario_id )->get();

         $datasp = DB::table('prestamo')
            ->Join('cliente', 'prestamo.cliente_id', '=', 'cliente.id')
            ->where([['prestamo.usuario_id', '=', $usuario_id], ['prestamo.estado', '!=', 'P']])
            ->pluck('cliente.nombres as nombres','prestamo.idp as idp')->toArray();


        if($request->ajax()){

            if($pagos_registrados == 0 || $pagos_registrados == null){
            $datas = DB::table('prestamo')
            ->Join('cliente', 'prestamo.cliente_id', '=', 'cliente.id')
            ->Join('detalle_prestamo', 'prestamo.idp', '=', 'detalle_prestamo.prestamo_id')
            ->where([['prestamo.usuario_id', '=', $usuario_id], ['detalle_prestamo.fecha_cuota', '=', $fecha_Actual], ['detalle_prestamo.estado', '=', 'C']])->get();
            return  DataTables()->of($datas)
                ->addColumn('action', function($datas){
                $button ='&nbsp;<button type="button" name="prestamo" id="'.$datas->idp.'"
                class = "pay btn-float  bg-gradient-warning btn-sm tooltipsC" title="Registar Pago"><i class="fa fa-fw fa-plus-circle"></i><i class="fas fa-money-bill-alt"></i></button>';
                return $button;

            })
            ->rawColumns(['action'])
            ->make(true);

         } else if($pagos_registrados == 1){

                $datas = DB::table('prestamo')
                ->Join('cliente', 'prestamo.cliente_id', '=', 'cliente.id')
                ->Join('detalle_prestamo', 'prestamo.idp', '=', 'detalle_prestamo.prestamo_id')
                ->where([['prestamo.usuario_id', '=', $usuario_id], ['detalle_prestamo.fecha_cuota', '=', $fecha_Actual]])
                ->whereIn('detalle_prestamo.estado', ['P','A'])
                ->get();

                return  DataTables()->of($datas)
                    ->addColumn('action', function($datas){
                    $button = '<button type="button" name="edit" id="'.$datas->idp.'"
                    class = "editpay btn-float  bg-gradient-primary btn-sm tooltipsC"  title="Editar Pago"><i class="far fa-edit"></i></button>';
                    $button .='&nbsp;<button type="button" name="prestamo" id="'.$datas->idp.'"
                    class = "detallepay btn-float  bg-gradient-success btn-sm tooltipsC" title="Detalle de Pago"><i class="fas fa-atlas"></i></i></button>';
                    return $button;

                })
                ->rawColumns(['action'])
                ->make(true);


            }


            }
        return view('admin.pago.index', compact('datas','clientes'));
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
    public function guardar(Request $request)
    {


        $vc= DetallePrestamo::where([['prestamo_id', '=', $request->prestamo_id],
        ['d_numero_cuota', '=', $request->numero_cuota]])->first();

        $saldo = Prestamo::where('idp', '=', $request->prestamo_id)->first();
        $saldop = $saldo->monto_pendiente;

        $vcd = $vc->valor_cuota;
        if($request->valor_abono == $saldop){

            Pago::create($request->all());

            DB::table('detalle_prestamo')
            ->where('prestamo_id', '=', $request->prestamo_id)
            ->update([
            'estado'=>'T',
            'updated_at'=> now()
            ]);

            $saldoa = Prestamo::where('idp', '=', $request->prestamo_id)->first();

            $cuotasat = $saldoa->cuotas_atrasadas;
            $saldoat = $saldoa->monto_atrasado;

            DB::table('prestamo')
            ->where([
                ['idp', '=', $request->prestamo_id]
                ])
            ->update([
            'monto_atrasado'=> 0,
            'cuotas_atrasadas'=> 0,
            'monto_pendiente'=>($saldop - $request->valor_abono),
            'observacion_prestamo'=>'Cancelado',
            'estado'=>'P',
            'updated_at'=> now()
            ]);

            return response()->json(['success' => 'total']);

            }else if($request->valor_abono == 0 || $request->valor_abono <  $vcd){

            Pago::create($request->all());

            DB::table('detalle_prestamo')
            ->where([['prestamo_id', '=', $request->prestamo_id],
                     ['d_numero_cuota', '=', $request->numero_cuota]])
            ->update([
            'estado'=>'A',
            'valor_cuota_pagada'=>$request->valor_abono,
            'updated_at'=> now()
            ]);

            $saldoa = Prestamo::where('idp', '=', $request->prestamo_id)->first();

            $cuotasat = $saldoa->cuotas_atrasadas;
            $saldoat = $saldoa->monto_atrasado;

            DB::table('prestamo')
            ->where([
                ['idp', '=', $request->prestamo_id]
                ])
            ->update([
            'monto_atrasado'=>($saldoat + ($request->valor_cuota - $request->valor_abono)),
            'cuotas_atrasadas'=>($cuotasat + 1),
            'monto_pendiente'=>($saldop - $request->valor_abono),
            'updated_at'=> now()
            ]);


        }else if($request->valor_abono > $vcd && $request->valor_abono < $saldop){

            $saldoa = Prestamo::where('idp', '=', $request->prestamo_id)->first();

            $cuotasat = $saldoa->cuotas_atrasadas; //Cuotas atrasadas totales
            $saldoat = $saldoa->monto_atrasado; // Saldo atrasado total
            $abonoat = $request->valor_abono - $vcd; // Abono a saldo atrasado
            $cuotasatdesc = round($abonoat/$vcd,2); // Cuotas a descontar de las atrasadas

            //dd($cuotasatdesc)

            if($cuotasatdesc <= $cuotasat ){

            Pago::create($request->all());

            DB::table('detalle_prestamo')
            ->where([['prestamo_id', '=', $request->prestamo_id],
                     ['d_numero_cuota', '=', $request->numero_cuota]])
            ->update([
            'estado'=>'P',
            'valor_cuota_pagada'=>$request->valor_abono,
            'updated_at'=> now()
            ]);



            DB::table('prestamo')
            ->where([
                ['idp', '=', $request->prestamo_id]
                ])
            ->update([
            'monto_atrasado'=>($saldoat - $abonoat),
            'cuotas_atrasadas'=>($cuotasat - $cuotasatdesc),
            'monto_pendiente'=>($saldop - $request->valor_abono),
            'updated_at'=> now()
            ]);
            }else if($cuotasat == 0 ){

                DB::table('detalle_prestamo')
            ->where([['prestamo_id', '=', $request->prestamo_id],
                     ['d_numero_cuota', '=', $request->numero_cuota]])
            ->update([
            'estado'=>'P',
            'valor_cuota_pagada'=>$request->valor_abono,
            'updated_at'=> now()
            ]);


            Pago::create($request->all());

            DB::table('prestamo')
            ->where([
                ['idp', '=', $request->prestamo_id]
                ])
            ->update([
            'monto_pendiente'=>($saldop - $request->valor_abono),
            'longitud'=>($request->valor_abono-$vcd),
            'updated_at'=> now()
            ]);

            }else{

                return response()->json(['success' => 'noa']);
            }


        }else if($vcd == $request->valor_abono){

        Pago::create($request->all());

        DB::table('detalle_prestamo')
        ->where([['prestamo_id', '=', $request->prestamo_id],
                 ['d_numero_cuota', '=', $request->numero_cuota]])
        ->update([
        'estado'=>'P',
        'valor_cuota_pagada'=>$request->valor_abono,
        'updated_at'=> now()
        ]);


        DB::table('prestamo')
        ->where([
            ['idp', '=', $request->prestamo_id]
            ])
        ->update([
        'monto_pendiente'=>($saldop - $request->valor_abono),
        'updated_at'=> now(),

        ]);

        }



        return response()->json(['success' => 'ok']);

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
    public function editar(Request $request, $id)
    {
        $fecha_Actual = Carbon::now();
        $fecha_Actual = $fecha_Actual->Format('Y-m-d');

        $usuario_id = $request->session()->get('usuario_id');

       if(request()->ajax()){
        $data = DB::table('prestamo')
        ->Join('cliente', 'prestamo.cliente_id', '=', 'cliente.id')
        ->Join('detalle_prestamo', 'prestamo.idp', '=', 'detalle_prestamo.prestamo_id')
        ->where([['prestamo.idp', '=', $id],['prestamo.usuario_id', '=', $usuario_id],['detalle_prestamo.fecha_cuota', '=', $fecha_Actual]])->get();
            return response()->json(['result'=>$data]);

        }
        return view('admin.pago.index');

    }

    public function editpay(Request $request, $id)
    {
        $fecha_Actual = Carbon::now();
        $fecha_Actual = $fecha_Actual->Format('Y-m-d');

        $usuario_id = $request->session()->get('usuario_id');

       if(request()->ajax()){
        $data = DB::table('prestamo')
        ->Join('cliente', 'prestamo.cliente_id', '=', 'cliente.id')
        ->Join('pago', 'prestamo.idp', '=', 'pago.prestamo_id')
        ->Join('detalle_prestamo', 'prestamo.idp', '=', 'detalle_prestamo.prestamo_id')
        ->where([['prestamo.idp', '=', $id],['prestamo.usuario_id', '=', $usuario_id],['pago.prestamo_id', '=', $id], ['detalle_prestamo.fecha_cuota', '=', $fecha_Actual], ['pago.fecha_pago', '=', $fecha_Actual]])->get();
            return response()->json(['result'=>$data]);

        }
        return view('admin.pago.index');

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


        $vc= DetallePrestamo::where([['prestamo_id', '=', $request->prestamo_id],
        ['d_numero_cuota', '=', $request->numero_cuota]])->first();

        $saldo = Prestamo::where('idp', '=', $request->prestamo_id)->first();
        $saldopv = $saldo->monto_pendiente;

        $vcd = $vc->valor_cuota;

        // Limpiar las cuotas pagadas actuales para la actualización.


        $pago =  Pago::where([['prestamo_id', '=', $request->prestamo_id], ['numero_cuota', '=', $request->numero_cuota]])->first();
        $pagoq = $pago->valor_abono; //Valor abono de cuota ya pagada

        $saldoa = Prestamo::where('idp', '=', $request->prestamo_id)->first();

        $cuotasat = $saldoa->cuotas_atrasadas; //Cuotas atrasadas totales
        $saldoat = $saldoa->monto_atrasado;    // Saldo atrasado total
        $saldoad = $saldoa->longitud;    // Saldo atrasado total

        if($pagoq == $vcd){

            DB::table('prestamo')
            ->where([
                ['idp', '=', $request->prestamo_id]
                ])
            ->update([
            'monto_pendiente'=>($saldopv + $pagoq),
            'updated_at'=> now()
             ]);

        }else if($pagoq == 0 || $pagoq < $vcd){

        DB::table('prestamo')
        ->where([
            ['idp', '=', $request->prestamo_id]
            ])
        ->update([
        'monto_atrasado'=>($saldoat - ($request->valor_cuota - $pagoq)),
        'cuotas_atrasadas'=>($cuotasat - 1),
        'monto_pendiente'=>($saldopv + $pagoq),
        'updated_at'=> now()
        ]);

        }else if($pagoq > $vcd && $pagoq < $saldopv){

            $abonoat = $pagoq - $vcd;
            $cuotasatdesc = round($abonoat/$vcd,2);

            if($saldoat > 0){
            DB::table('prestamo')
            ->where([
                ['idp', '=', $request->prestamo_id]
                ])
            ->update([
            'monto_atrasado'=>($saldoat + $abonoat),
            'cuotas_atrasadas'=>($cuotasat + $cuotasatdesc),
            'monto_pendiente'=>($saldopv + $pagoq),
            'updated_at'=> now()
            ]);
            }else{
                DB::table('prestamo')
                ->where([
                    ['idp', '=', $request->prestamo_id]
                    ])
                ->update([
                'monto_atrasado'=>0,
                'longitud'=>($saldoad - ($pagoq - $vcd)),
                'cuotas_atrasadas'=>0,
                'monto_pendiente'=>($saldopv + $pagoq),
                'updated_at'=> now()
                ]);


            }
        }

        $saldopa = Prestamo::where('idp', '=', $request->prestamo_id)->first();
        $saldop = $saldopa->monto_pendiente;


        if($request->valor_abono == 0 || $request->valor_abono <  $vcd){

            $pago =  Pago::where([['prestamo_id', '=', $request->prestamo_id], ['numero_cuota', '=', $request->numero_cuota]])->first();

            DB::table('detalle_prestamo')
            ->where([['prestamo_id', '=', $request->prestamo_id],
                     ['d_numero_cuota', '=', $request->numero_cuota]])
            ->update([
            'estado'=>'A',
            'valor_cuota_pagada'=>$request->valor_abono,
            'updated_at'=> now()
            ]);

            $saldoa = Prestamo::where('idp', '=', $request->prestamo_id)->first();

            $cuotasat = $saldoa->cuotas_atrasadas; //Cuotas atrasadas totales
            $saldoat = $saldoa->monto_atrasado;    // Saldo atrasado total


            //Actualiza de nuevo
            $pago->update($request->all());

            $saldoa = Prestamo::where('idp', '=', $request->prestamo_id)->first();

            $cuotasat = $saldoa->cuotas_atrasadas;//Cuotas atrasadas totales
            $saldoat = $saldoa->monto_atrasado; // Saldo atrasado total

            DB::table('prestamo')
            ->where([
                ['idp', '=', $request->prestamo_id]
                ])
            ->update([
            'monto_atrasado'=>($saldoat + ($request->valor_cuota - $request->valor_abono)),
            'cuotas_atrasadas'=>($cuotasat + 1),
            'monto_pendiente'=>($saldop - $request->valor_abono),
            'updated_at'=> now()
            ]);



        }else if($request->valor_abono > $vcd && $request->valor_abono < $saldop){

            $saldoa = Prestamo::where('idp', '=', $request->prestamo_id)->first();

            $cuotasat = $saldoa->cuotas_atrasadas; //Cuotas atrasadas totales
            $saldoat = $saldoa->monto_atrasado; // Saldo atrasado total
            $abonoat = $request->valor_abono - $vcd; // Abono a saldo atrasado
            $cuotasatdesc = round($abonoat/$vcd,2); // Cuotas a descontar de las atrasadas

            if($cuotasatdesc <= $cuotasat && $abonoat <= $saldoat ){

            DB::table('detalle_prestamo')
            ->where([['prestamo_id', '=', $request->prestamo_id],
                     ['d_numero_cuota', '=', $request->numero_cuota]])
            ->update([
            'estado'=>'P',
            'valor_cuota_pagada'=>$request->valor_abono,
            'updated_at'=> now()
            ]);

            //Actualiza de nuevo
            $pago->update($request->all());

            DB::table('prestamo')
            ->where([
                ['idp', '=', $request->prestamo_id]
                ])
            ->update([
            'monto_atrasado'=>($saldoat - $abonoat),
            'cuotas_atrasadas'=>($cuotasat - $cuotasatdesc),
            'monto_pendiente'=>($saldop - $request->valor_abono),
            'updated_at'=> now()
            ]);
            }else if($cuotasat == 0 ){

                DB::table('detalle_prestamo')
            ->where([['prestamo_id', '=', $request->prestamo_id],
                     ['d_numero_cuota', '=', $request->numero_cuota]])
            ->update([
            'estado'=>'P',
            'valor_cuota_pagada'=>$request->valor_abono,
            'updated_at'=> now()
            ]);

            //Actualiza de nuevo
            $pago->update($request->all());

            DB::table('prestamo')
            ->where([
                ['idp', '=', $request->prestamo_id]
                ])
            ->update([
            'monto_pendiente'=>($saldop - $request->valor_abono),
            'longitud'=>($request->valor_abono - $vcd),
            'updated_at'=> now()
            ]);

            }else{

                return response()->json(['success' => 'noa']);
            }


        }else if($vcd == $request->valor_abono){

        $pago =  Pago::where([['prestamo_id', '=', $request->prestamo_id], ['numero_cuota', '=', $request->numero_cuota]])->first();
        $pagoq = $pago->valor_abono; //Valor abono de cuota ya pagada

        DB::table('detalle_prestamo')
        ->where([['prestamo_id', '=', $request->prestamo_id],
                 ['d_numero_cuota', '=', $request->numero_cuota]])
        ->update([
        'estado'=>'P',
        'valor_cuota_pagada'=>$request->valor_abono,
        'updated_at'=> now()
        ]);

         //Actualiza de nuevo
        $pago->update($request->all());


        DB::table('prestamo')
        ->where([
            ['idp', '=', $request->prestamo_id]
            ])
        ->update([
        'monto_pendiente'=>($saldop - $request->valor_abono),
        'updated_at'=> now(),

        ]);

        }



        return response()->json(['success' => 'oka']);
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

    public function detalle($id)
    {

        if(request()->ajax()){


            $dataPagos = DB::table('pago')
             ->where('prestamo_id', '=', $id)->get();


            return response()->json(['result1'=>$dataPagos ]);

        }




    }
}
