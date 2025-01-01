<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;


class OrderController extends Controller
{
    use ApiResponseTrait ;
    
    public function index()
    {
        $user = JWTAuth::parseToken()->authenticate();

        if (!$user) {
            return $this->ApiResponse(null, 'User not authenticated', 401);
        }
        $order = Order::where('user_id' , $user->id )->get();
        return $this->ApiResponse($order , 'show order successfully' , 200);
    }

    public function store(OrderRequest $request)
    {
        try{
            $token = $request->bearerToken();

            if (is_null($token)) {
                // لو مفيش توكن، سجل المستخدم الجديد
                $authController = new AuthController();
                $new_user = $authController->register($request);
    
                $request->merge(['user_id' => $new_user->id]);
                $order = Order::create($request->except(['name', 'email', 'password', 'phone', 'latitude', 'longitude']));
                $order->token = $new_user->token;
    
                return $this->ApiResponse($order, 'Store order successfully', 201);
            }
    
            $user = JWTAuth::parseToken()->authenticate();
    
            $validatedData = $request->validated();
            $validatedData['user_id'] = $user->id;
            $order = Order::create($validatedData);
    
            return $this->ApiResponse($order, 'Store order successfully', 201);
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
