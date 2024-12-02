<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use Exception;

class PackageController extends Controller
{
    use ApiResponseTrait ;
    public function index(){
        $Packages = Package::all();
        return $this->ApiResponse($Packages , 'get all packages successfully' , 200 ) ;
    }

    public function show($id){
        try{
        $Package = Package::findOrFail($id);
        return $this->ApiResponse($Package , 'get Package has '.$id.' successfully' , 200 ) ;
    }catch(Exception $e){
        return response()->json([
            'error' => 'Something went wrong',
            'message' => $e->getMessage()], 400);
    }

    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|between:2,30',
            'average' => 'required',
        ]);
    
        $package = Package::create($validatedData);
        return $this->ApiResponse( $package , 'store Package  successfully' , 201 ) ;

    }
    public function update(Request $request , $id){
        try{
        $validatedData  = $request->validate([
            'name' => 'required|string|between:2,30',
            'average' => 'required'
        ]);
        $Package = Package::findOrFail($id);
        $Package->update($validatedData);
        return $this->ApiResponse( $Package , 'update Package  successfully' , 200 ) ;
    }catch(Exception $e){
        return response()->json([
            'error' => 'Something went wrong',
            'message' => $e->getMessage()], 400);
    }
    }

    public function destroy($id){
        Package::destroy($id);
        return $this->ApiResponse(null, 'delete Package successfully' , 204 ) ;

    }
}
