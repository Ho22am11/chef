<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cuisine;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;

class CuisineController extends Controller
{
    use ApiResponseTrait ;
    public function index(){
        $cuisines = Cuisine::all();
        return $this->ApiResponse($cuisines , 'get all cuisines successfully' , 200 ) ;
    }

    public function show($id){
        $cuisine = Cuisine::findOrFail($id);
        return $this->ApiResponse($cuisine , 'get cuisine has'.$id.' successfully' , 200 ) ;

    }

    public function store(Request $request){
        $validatedData  = $request->validate(['name' => 'required|string|between:2,30']);
        $cuisine = Cuisine::create($validatedData);
        return $this->ApiResponse( $cuisine , 'store cuisine  successfully' , 201 ) ;

    }
    public function update(Request $request , $id){
        $validatedData  = $request->validate(['name' => 'required|string|between:2,30']);
        $cuisine = Cuisine::findOrFail($id);
        $cuisine->update($validatedData);
        return $this->ApiResponse( $cuisine , 'update cuisine  successfully' , 200 ) ;
    }

    public function destroy($id){
        Cuisine::destroy($id);
        return $this->ApiResponse(null, 'delete cuisine successfully' , 204 ) ;

    }
}
