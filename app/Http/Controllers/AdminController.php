<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function users()
    {
        $users = User::all();
        return response($users,201);
    }

    public function showuser($id)
    {
     $user = User::find($id);
     return response($user,201);
    }


    public function delete($id)
    {
        $user = User::destroy($id);
        return response('success',201);
    }

    public function userupdate(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());

        return response($user,'201');

    }
}
