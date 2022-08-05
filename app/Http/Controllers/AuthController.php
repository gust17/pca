<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){

        $data = $request->validate([
            'name' => 'required|string',
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


        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'type' => $data['type'],
        ]);

        if($data['modo_validade_senha'] == 'data_especifica') {
            $user->password_validate = date("Y-m-d", strtotime($data['data_validade']));
        }

        if($request->hasFile('photo_0')) {
            $user->photo = uploadImg($request->photo_0, 'images/users/profile_pictures');
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
