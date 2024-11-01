<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;

class PackageController extends Controller
{
    use ApiResponseTrait ;
    public function index(){
        $Packages = Package::all();
        return $this->ApiResponse($Packages , 'get all packages successfully' , 200 ) ;
    }

    public function show($id){
        $Package = Package::findOrFail($id);
        return $this->ApiResponse($Package , 'get Package has '.$id.' successfully' , 200 ) ;

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
        $validatedData  = $request->validate([
            'name' => 'required|string|between:2,30',
            'average' => 'required|numeric'
        ]);
        $Package = Package::findOrFail($id);
        $Package->update($validatedData);
        return $this->ApiResponse( $Package , 'update Package  successfully' , 200 ) ;
    }

    public function destroy($id){
        Package::destroy($id);
        return $this->ApiResponse(null, 'delete Package successfully' , 204 ) ;

    }
}
