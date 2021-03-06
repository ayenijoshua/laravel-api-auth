<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController {

    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function update(Request $request, $id)
    {

        $user = User::where('email',$request->email)->orWhere('phone',$request->phone)->first();

        if($user){
            return response()->json('Email or phone already exist',422);
        }
       
        User::findOrFail($id)->update($request->all());
        
        return response()->json('User updated successfuly',200);
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();

        return response()->json('User deleted successfuly',200);
    }
}