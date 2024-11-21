<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    use ApiResponseTrait ;

    public function store(OrderRequest $request)
    {
        try{
        $request->except('name' , 'email' , 'password' , 'phone' , 'latitude' , 'longitude');
        $validatedData = $request->validated();
        $order = Order::create($validatedData);

        $token = $request->bearerToken(); 

        if (is_null($token)) {
           $authController = new AuthController();
           $user = $authController->register($request);
           $order->user_id = $user->id ;
           $order->save();
           return $this->ApiResponse($order , 'store order successfully' , 201);
        } else{
    
            return $this->ApiResponse($order , 'store order successfully' , 201);
        }
        }catch(\Exception $e){
            return response()->json([
                'error' => 'Something went wrong',
                'message' => $e->getMessage()], 500);
        }

       }

   
    public function show($id)
    {
        $order = Order::find($id);
        
        return $this->ApiResponse($order , 'show order successfully' , 200);
    }

    public function edit($id)
    {
        $order = Order::where('user_id' , $id)->get();
        return $this->ApiResponse($order , 'show order successfully' , 200);
    }

    
    public function update(OrderRequest $request, $id)
    {
        $validatedData = $request->validated(); 
        $order = Order::findOrFail($id);
        $order->update($validatedData);
        return $this->ApiResponse($order , 'update order successfully' , 200);

    }

    /**
     * soft delete not destroy
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->update(['state' => 'canceled' ]);

        return $this->ApiResponse( $order , 'The order has been cancelled' ,200 );
    }
}
