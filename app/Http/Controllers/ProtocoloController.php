<?php

namespace App\Http\Controllers;

use App\Models\Protocolo;
use Illuminate\Http\Request;

class ProtocoloController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = Protocolo::create($request->all());

        return response($model, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Protocolo  $protocolo
     * @return \Illuminate\Http\Response
     */
    public function show(Protocolo $protocolo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Protocolo  $protocolo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Protocolo $protocolo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Protocolo  $protocolo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Protocolo $protocolo)
    {
        //
    }
}
