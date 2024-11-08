<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use App\Actions\SaveAttachment;
use App\Traits\ApiResponseTrait;

class DataController extends Controller
{
    use ApiResponseTrait;
    public function update(Request $request , $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100',
            'phone' => 'required|numeric' ,  
            
        ]);

        if ($validator->fails()) {
            return $this->ApiResponse($validator->errors(), 'register not successed', 400);
        }

        $user = User::findOrFail($id);


        if ($request->has('img')){
            $data = SaveAttachment::execute($request , 'img' , 'users/img');

            $user->update($data);
            return $this->ApiResponse($user , 'updated successfuly' , 200);

        }

        $user->update($request->all());
        return $this->ApiResponse($user , 'updated successfuly' , 200);

    }
}
