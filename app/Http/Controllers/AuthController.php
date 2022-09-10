<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){

        // return response($request->name, 201);

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|string|unique:users,email',
            'password' => 'string|confirmed',
            'modo_validade_senha' => 'required|string',
            'modo_senha' => 'required|string',
            'type' => 'nullable',
            'data_validade' => 'nullable',
            'photo' => 'nullable'
        ]);

        if ($data['modo_senha'] == 'automatico') {
            $data['password'] = bcrypt('12345678');
        } else {
            $data['password'] = bcrypt($data['password']);
        }

        $name = json_decode($data['name']);

        $data_model = [
            'email' => $data['email'],
            'password' => $data['password'],
            'type' => $data['type'],
        ];

        switch ($name->value->model) {
            case 'servidor-publico':
                $data_model['servidor_publico_id'] = $name->value->id;
                break;
            case 'solicitante-externo':
                $data_model['solicitante_externo_id'] = $name->value->id;
                break;
        }

        $user = User::create($data_model);

        if($data['modo_validade_senha'] == 'data_especifica') {
            $user->password_validate = $data['data_validade'];
        }


        if($request->hasFile('photo')) {
            $user->photo = uploadImg($request->file('photo'), 'images/users/profile_pictures');
        }
        
        $user->save();

        $token = $user->createToken('apiToken')->plainTextToken;

        $res = [
            'user' => $user,
            'token' => $token
        ];
        return response($res, 201);

    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response([
                'msg' => 'incorrect username or password'
            ], 401);
        }

        $token = $user->createToken('apiToken')->plainTextToken;

        $res = [
            'user' => $user,
            'token' => $token
        ];

        return response($res, 201);
    }

    public function logout(Request $request)
    {
        auth()->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully logged out'
        ],200);
    }
}
