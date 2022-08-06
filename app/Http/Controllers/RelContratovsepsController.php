<?php

namespace App\Http\Controllers;

use App\Models\Admin\rel__contratovseps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RelContratovsepsController extends Controller
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
     * @param  \App\Models\Admin\rel__contratovseps  $rel_contratovseps
     * @return \Illuminate\Http\Response
     */
    public function show(rel__contratovseps $rel__contratovseps)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\rel__contratovseps  $rel_contratovseps
     * @return \Illuminate\Http\Response
     */
    public function edit(rel__contratovseps $rel__contratovseps)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\rel__contratovseps  $rel_contratovseps
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rel__contratovseps $rel__contratovseps)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\rel_contratovseps  $rel_contratovseps
     * @return \Illuminate\Http\Response
     */
    public function destroy(rel__contratovseps $rel__contratovseps)
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

            $datasp = DB::table('rel__contratovseps')
            ->where('id_contratovseps', '=', $id )
            ->delete();

        return response()->json(['success' => 'ok3']);
        }
    }
}
