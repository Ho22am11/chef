<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;


class ServiceController extends Controller
{
    use ApiResponseTrait ;
    public function index(){
        $services = Service::all();
        return $this->ApiResponse($services , 'get all services successfully' , 200 ) ;
    }

    public function show($id){
        $service = Service::findOrFail($id);
        return $this->ApiResponse($service , 'get service has'.$id.' successfully' , 200 ) ;

    }

    public function store(Request $request){
        $validatedData  = $request->validate(['name' => 'required|string|between:2,20']);
        $service = Service::create($validatedData);
        return $this->ApiResponse( $service , 'store service  successfully' , 201 ) ;

    }
    public function update(Request $request , $id){
        $validatedData  = $request->validate(['name' => 'required|string|between:2,20']);
        $service = Service::findOrFail($id);
        $service->update($validatedData);
        return $this->ApiResponse( $service , 'update service  successfully' , 200 ) ;
    }

    public function destroy($id){
        Service::destroy($id);
        return $this->ApiResponse(null, 'delete service  successfully' , 200 ) ;

    }

}
