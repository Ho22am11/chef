<?php

namespace App\Http\Controllers\Chef;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Traits\ApiResponseTrait;
use Exception;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class OfferController extends Controller
{
    use ApiResponseTrait ;

    
    public function store(Request $request)
    {
        try{

        $user = JWTAuth::parseToken()->authenticate();
        
        $data = $request->all();
        $data['chef_id'] = $user->id ;

        $offer = Offer::create($data);
        return $this->ApiResponse($offer , 'store offer successfully' , 201 );

        }catch(Exception $e){
            return response()->json([
                'error' => 'Something went wrong',
                'message' => $e->getMessage()], 500);
        }
    }

    
    public function show($id)
    {
       $offer = Offer::findOrfail($id);
       return $this->ApiResponse($offer , 'get offer successfully' , 200 );

    }

   
    public function update(Request $request , $id )
    {
        try{
            $offer = Offer::findOrfail($id);
            $offer->update($request->all()) ;
            return $this->ApiResponse($offer , 'update offer successfully' , 201 );

        }catch(Exception $e){
            return response()->json([
                'error' => 'Something went wrong',
                'message' => $e->getMessage()], 500);
            }
    }

    
    public function destroy($id)
    {
        Offer::destroy($id) ;
        return $this->ApiResponse( null  , 'delete offer successfully' , 200 );

    }
}
