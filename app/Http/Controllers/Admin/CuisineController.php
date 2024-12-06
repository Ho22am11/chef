<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cuisine;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use Exception;

class CuisineController extends Controller
{
    use ApiResponseTrait ;
    public function index(){
        $cuisines = Cuisine::all();
        return $this->ApiResponse($cuisines , 'get all cuisines successfully' , 200 ) ;
    }

    public function show($id){
        try{
        $cuisine = Cuisine::findOrFail($id);
        return $this->ApiResponse($cuisine , 'get cuisine has'.$id.' successfully' , 200 ) ;
<<<<<<< HEAD
        }
        catch(Exception $e){
            return response()->json([
                'error' => 'Something went wrong',
                'message' => $e->getMessage()], 500);
=======
        }catch(Exception $e){
            return response()->json([
                'error' => 'Something went wrong',
                'message' => $e->getMessage()], 400);
>>>>>>> 49f3591e9d9f90a7a70e7092f8b43591490421a0
        }

    }

    public function store(Request $request){
        $validatedData  = $request->validate(['name' => 'required|string|between:2,30']);
        $cuisine = Cuisine::create($validatedData);
        return $this->ApiResponse( $cuisine , 'store cuisine  successfully' , 201 ) ;

    }
    public function update(Request $request , $id){
        try{
        $validatedData  = $request->validate(['name' => 'required|string|between:2,30']);
        $cuisine = Cuisine::findOrFail($id);
        $cuisine->update($validatedData);
        return $this->ApiResponse( $cuisine , 'update cuisine  successfully' , 200 ) ;
<<<<<<< HEAD
        }
        catch(Exception $e){
            return response()->json([
                'error' => 'Something went wrong',
                'message' => $e->getMessage()], 500);
=======
        }catch(Exception $e){
            return response()->json([
                'error' => 'Something went wrong',
                'message' => $e->getMessage()], 400);
>>>>>>> 49f3591e9d9f90a7a70e7092f8b43591490421a0
        }
    }

    public function destroy($id){
        Cuisine::destroy($id);
        return $this->ApiResponse(null, 'delete cuisine successfully' , 200 ) ;

    }
}
