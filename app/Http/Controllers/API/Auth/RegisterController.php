<?php
namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required',
            'name'=>'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(),422);
        }

        User::create([
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>bcrypt($request->password),
            'name'=>$request->name
        ]);
        
        return response()->json('User created successfuly',200);
    }
}