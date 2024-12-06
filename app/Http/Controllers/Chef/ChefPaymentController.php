<?php

namespace App\Http\Controllers\Chef;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChefPaymentRequest;
use App\Models\ChefPayment;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait ;
use Exception;

class ChefPaymentController extends Controller
{
    use ApiResponseTrait ;
    public function store(ChefPaymentRequest $request){
        $payment = ChefPayment::create($request->all());
        return $this->ApiResponse($payment , 'store payment information successfuly' , 201);
        
    }

    public function show($id){
        try{
        $payment = ChefPayment::where('chef_id',$id)->get();
        return $this->ApiResponse($payment , 'show payment information successfuly' , 200);
        }catch(Exception $e){
            return response()->json([
                'error' => 'Something went wrong',
                'message' => $e->getMessage()], 500);
        }
    }

    public function update(ChefPaymentRequest $request , $id){
        $payment = ChefPayment::findOrfail($id);
        $payment->update($request->all());
        return $this->ApiResponse($payment , 'show payment information successfuly' , 200);
    }
}
