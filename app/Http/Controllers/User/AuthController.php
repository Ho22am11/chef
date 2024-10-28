<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Traits\ApiResponseTrait;
use Dotenv\Validator as DotenvValidator;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Validator;
class AuthController extends Controller
{
    use ApiResponseTrait ;

    public function register(Request $request){
        try{
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
            'phone' => 'required|numeric' ,  //max:15 not work !
        ]);

         if ($validator->fails()) {
            return $this->ApiResponse($validator->errors(), 'register not successed', 400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone ,
            'latitude' => $request->latitude ,
            'longitude' => $request->longitude ,
        ]);

        $token = auth()->guard('user')->attempt($request->only('email', 'password'));

        $user->token = $token ;

        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    
        return $this->ApiResponse($user , 'Chef successfully registered' , 201);

    } catch(\Exception $e){
        return response()->json([
        'error' => 'Something went wrong',
        'message' => $e->getMessage()], 500);
    }


    }
}