<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function users()
    {
        $users = User::withTrashed()->get();
        return response($users,201);
    }

    public function showuser($id)
    {
     $user = User::find($id);
     return response($user,201);
    }


    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return response('success',201);
    }

    public function restore($id)
    {
        $user = User::withTrashed()->where('id', $id)->first();
        $user->restore();
        
        return response('success',201);
    }

    public function userupdate(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());

        if($request->hasFile('photo_0')) {
            if($user->photo) {
                removeImg($user->photo);
            }

            if($request->hasFile('photo_0')) {
                $user->photo = uploadImg($request->photo_0, 'images/users/profile_pictures');
            }
            
            $user->save();
        }

        return response($user,'201');

    }
}
