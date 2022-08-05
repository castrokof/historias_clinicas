<?php

namespace App\Http\Controllers;

use App\Models\Admin\rel__contratovsservicio;
use Illuminate\Http\Request;

class RelContratovsservicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Admin\rel__contratovsservicio  $rel_contratovsservicio
     * @return \Illuminate\Http\Response
     */
    public function show(rel__contratovsservicio $rel__contratovsservicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\rel__contratovsservicio  $rel_contratovsservicio
     * @return \Illuminate\Http\Response
     */
    public function edit(rel__contratovsservicio $rel__contratovsservicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\rel__contratovsservicio  $rel__contratovsservicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rel__contratovsservicio $rel__contratovsservicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\rel__contratovsservicio  $rel_contratovsservicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(rel__contratovsservicio $rel__contratovsservicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request, $id)
    {
        if($request->ajax()){
 
            rel__contratovsservicio::where('id_contratovsservicios', $id)->delete();

        return response()->json(['success' => 'ok1']);
        }
    }
}
