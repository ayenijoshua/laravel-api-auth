<?php
namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller{

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required_without:phone',
            'phone' => 'required_without:email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json('Some required fields are empty',422);
        }
        
        $user = User::where('email',$request->email)->orWhere('phone',$request->phone)->first();

        if(! $user){
            return response()->json('Invalid login credentials',422);
        }
        
        $passwordIsCorrect = Hash::check($request->password,$user->password);

        if(! $passwordIsCorrect){
            return response()->json('Invalid login credentials',422);
        }

        Auth::login($user);
        
        $user->createToken('authToken')->accessToken;

        $resource = [
            'user' => $user,
            'access_tokens' => $user->tokens,
        ];

        return response()->json($resource,200);
    }
}