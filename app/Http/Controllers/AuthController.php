<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function register(Request $request){
      
     
$validatedData = $request->validate([
'name' => 'required|string|max:255',
                   'email' => 'required|string|email|max:255|unique:users',
                   'password' => 'required|string|min:8',
]);
// return password_hash($validatedData['password'], PASSWORD_DEFAULT);

      $user = User::create([
              'name' => $validatedData['name'],
                   'email' => $validatedData['email'],
                   'password'=>password_hash($validatedData['password'], PASSWORD_DEFAULT),
                   // 'password' => Hash::make($validatedData['password']),
       ]);

$token = $user->createToken('auth_token')->plainTextToken;

return response()->json([
              'access_token' => $token,
                   'token_type' => 'Bearer',
]);
}

public function login(Request $request){
// if (!Auth::attempt($request->only('email', 'password'))) {
// return response()->json([
// 'message' => 'Invalid login details'
//            ], 401);
//        }

//var_dump($request->password);

 $user = User::where('email', $request['email'])->firstOrFail();

 //return $user;
$token = $user->createToken('auth_token')->plainTextToken;

return response()->json([
           'access_token' => $token,
           'token_type' => 'Bearer',
]);
}


public function me(Request $request)
{
return $request->user();
}

public function ulogin()
{
return "authentification requise";
}
}
