<?php

namespace App\Http\Controllers;

use App\Models\ServidorPublico;
use Illuminate\Http\Request;

class ServidorPublicoController extends Controller
{
    public function index()
    {
        return response(ServidorPublico::all(), 201);
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        $inputs['data_nascimento'] = formatDate($inputs['data_nascimento'], 'Y-m-d');

        return response(ServidorPublico::create($inputs), 201);
    }

    public function show(ServidorPublico $servidorPublico)
    {
        return response(ServidorPublico::findOrFail($id), 201);
    }

    public function update(Request $request, ServidorPublico $servidorPublico)
    {
        $inputs = $request->all();
        $inputs['data_nascimento'] = formatDate($inputs['data_nascimento'], 'Y-m-d');

        return response(ServidorPublico::findOrFail($id)->update($inputs), 201);
    }

    public function destroy(ServidorPublico $servidorPublico)
    {
        //
    }
}
