<?php

namespace App\Http\Controllers\Chef;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use Validator;
use App\Models\Chef;
use App\Models\ChefProfile;

class AuthController extends Controller
{
    use ApiResponseTrait ;

    public function register(Request $request){

        try{
            $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|between:3,15' ,
            'last_name' => 'required|string|between:3,15' ,
            'email' => 'required|string|email|max:100|unique:chefs',
            'password' => 'required|string|min:6',
            'phone' => 'required|numeric|unique:chefs' ,
            'whats_app' => 'required|numeric' ,
        ]);

        if($validator->fails()){
            return $this->ApiResponse($validator->errors() , 'register not successed' , 400);
        }

       $chef = Chef::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'whats_app' => $request->whats_app,
            'gender' => $request->gender ,
            'password' => bcrypt($request->password),
        ]);



        ChefProfile::create(['chef_id' => $chef->id ]);


        $token = auth()->guard('chef')->attempt($request->only('email' , 'password'));

        $chef->token = $token ;

        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    
        return $this->ApiResponse($chef , 'Chef successfully registered' , 201);
    } catch(\Exception $e){
        return response()->json([
        'error' => 'Something went wrong',
        'message' => $e->getMessage()], 500);
    }
    }
}
