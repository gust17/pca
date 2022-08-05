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

        if($request->hasFile('photo_0')) {
            $imageName = $request->file('photo_0')->getClientOriginalName() . time().'.'.$request->photo_0->extension();  
            $request->photo_0->move(public_path('images/users/profile_pictures'), $imageName);
            $fullName = 'images/users/profile_pictures/' . $imageName;
            $user->photo = $fullName;
            $user->save();
        }

        return response($user,'201');

    }
}
