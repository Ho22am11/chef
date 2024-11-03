<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Validator;
use App\Traits\ApiResponseTrait; 

class FeedbackController extends Controller
{
    use ApiResponseTrait ;
    
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'frist_name' => 'required|string|between:2,10',
            'last_name' => 'required|string|between:2,10',
            'email' => 'required|string|email',
            'phone' => 'required|numeric' ,
            'message' => 'required|string' ,
        ]);

        if ($validator->fails()) {
            return $this->ApiResponse($validator->errors(), 'register not successed', 400);
        }

        $feedback = Feedback::create($request->all());

        return $this->ApiResponse($feedback , 'user successfully registered' , 201);


    }

}
