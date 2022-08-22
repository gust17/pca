<?php

namespace App\Http\Controllers;

use App\Models\Endereco;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UtilsController extends Controller
{
    public function getAddress($cep)
    {
        // https://ws.apicep.com/cep/[cepCode].[format]
        // https://ws.apicep.com/cep/06233-030.json

        //***
       // address: "Avenida João Guerra"
       // city: "Macapá"
       // code: "68904-360"
       // district: "Congós"
       // ok: true
       // state: "AP"
       // status: 200
       // statusText: "ok"
        //*/

        $response = Http::get('https://ws.apicep.com/cep/' . $cep . '.json');

        if($response['status'] >= 200 && $response['status'] < 300) {
            $data = [
                'cidade' => $response['city'],
                'bairro' => $response['district'],
                'uf' => $response['state'],
                'logradouro' => $response['address']
            ];

            return response($data, 201);
        }

        $enderecoDB = Endereco::where('cep', $cep)->first();

        if(isset($enderecoDB))
            return response($enderecoDB, 201);

        return response('Não encontrado.', 404);

    }
}
