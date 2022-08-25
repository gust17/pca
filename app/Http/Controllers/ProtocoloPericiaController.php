<?php

namespace App\Http\Controllers;

use App\Models\ProtocoloPericia;
use Illuminate\Http\Request;

class ProtocoloPericiaController extends Controller
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
        $model = ProtocoloPericia::create($request->all());

        return response($model, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProtocoloPericia  $protocolo
     * @return \Illuminate\Http\Response
     */
    public function show(ProtocoloPericia $protocolo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProtocoloPericia  $protocolo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProtocoloPericia $protocolo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProtocoloPericia  $protocolo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProtocoloPericia $protocolo)
    {
        //
    }
}
