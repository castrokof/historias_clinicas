<?php

namespace App\Http\Controllers;

use App\Models\Admin\Def_Profesionales;
use App\Models\Def_Agendas;
use Illuminate\Http\Request;

class DefAgendasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.agenda.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectprofesional(Request $request)
    {
        $profesionales = [];

        if ($request->has('q')) {

            $term = $request->get('q');
            $profesionales = Def_Profesionales::orderBy('id_profesional')
                ->where('nombre', 'LIKE', '%' . $term . '%')
                ->orWhere('codigo', 'LIKE', '%' . $term . '%')
                ->get();
            return response()->json($profesionales);
        }else {

            $profesionales = Def_Profesionales::orderBy('id_profesional')
                ->get();

            return response()->json($profesionales);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {

        if($request->ajax()){
            # code...
            return response()->json(['success' => 'ok']);

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Def_Agendas  $def_Agendas
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Def_Agendas  $def_Agendas
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Def_Agendas  $def_Agendas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Def_Agendas  $def_Agendas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }
}
