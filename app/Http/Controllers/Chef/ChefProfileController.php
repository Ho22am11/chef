<?php

namespace App\Http\Controllers\Chef;

use App\Http\Controllers\Controller;
use App\Models\ChefProfile;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
class ChefProfileController extends Controller
{
    use ApiResponseTrait ;
    public function update(Request $request , $id){
        $profile = ChefProfile::where( 'chef_id' ,$id)->first();
        $profile->update($request->all()) ;
        
        return $this->ApiResponse($profile , 'update successfully' , 201);
    }


    public function show($id){
        $profile = ChefProfile::where( 'chef_id' ,$id)->first();
        return $this->ApiResponse($profile , 'update successfully' , 201);
    }
}
