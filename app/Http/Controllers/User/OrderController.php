<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;

class OrderController extends Controller
{
    use ApiResponseTrait ;

    public function store(OrderRequest $request)
    {
        $validatedData = $request->validated();
        $order = Order::create($validatedData);

        return $this->ApiResponse($order , 'store order successfully' , 201);

       }

   
    public function show($id)
    {
        $order = Order::findOrFail($id);
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

        return $this->ApiResponse(null , 'The order has been cancelled' ,204 );
    }
}
