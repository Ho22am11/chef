<?php

namespace App\Http\Controllers\Chef;

use App\Http\Controllers\Controller;
use App\Models\ChefLocation;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait ;
class ChefloctionController extends Controller
{
    use  ApiResponseTrait ;
    public function store(Request $request){

      
        $chefLocation =  ChefLocation::create($request->all());
        return $this->ApiResponse($chefLocation , 'store loction succuessfuly' , 201) ;
    }

    public function show($id){
        $chefLocation =  ChefLocation::where('chef_id' ,$id)->first();
        return $this->ApiResponse($chefLocation , 'get loction succuessfuly' , 200 ) ;

    }

    public function update(Request $request , $id){
        $chefLocation =  ChefLocation::where('chef_id' ,$id)->first();
        $chefLocation->update($request->all()); 
        return $this->ApiResponse($chefLocation , 'get loction succuessfuly' , 200 ) ;
    }
}
