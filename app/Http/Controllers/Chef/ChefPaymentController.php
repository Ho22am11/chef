<?php

namespace App\Http\Controllers\Chef;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChefPaymentRequest;
use App\Models\ChefPayment;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait ;
class ChefPaymentController extends Controller
{
    use ApiResponseTrait ;
    public function store(ChefPaymentRequest $request){
        $payment = ChefPayment::create($request->all());
        return $this->ApiResponse($payment , 'store payment information successfuly' , 201);
        
    }

    public function show($id){
        $payment = ChefPayment::findOrfail($id);
        return $this->ApiResponse($payment , 'show payment information successfuly' , 200);
    }

    public function update(ChefPaymentRequest $request , $id){
        $payment = ChefPayment::findOrfail($id);
        $payment->update($request->all());
        return $this->ApiResponse($payment , 'show payment information successfuly' , 200);
    }
}
