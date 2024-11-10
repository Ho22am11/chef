<?php

namespace App\Http\Controllers\Chef;

use App\Http\Controllers\Controller;
use App\Models\RequestSetting;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait ;
class RequestSettingController extends Controller
{
    use ApiResponseTrait ;
    public function index(){
        $request_setting = RequestSetting::all();
        return  $this->ApiResponse($request_setting , 'get all  rquest successfully' , 201) ;
    }
    public function store(Request $request){
        $request_setting = RequestSetting::create($request->all());
        return  $this->ApiResponse($request_setting , 'store rquest successfully' , 201) ;
    }

    public function show($id){
        $request_setting = RequestSetting::find($id);
        return  $this->ApiResponse($request_setting , 'show rquest successfully' , 200) ;
    }

    public function update(Request $request , $id){
        $request_setting = RequestSetting::find($id);
        $request_setting->update($request->all());
        return  $this->ApiResponse($request_setting , 'update rquest successfully' , 200) ;
    }
    public function destroy($id){
        RequestSetting::destroy($id);
        return  $this->ApiResponse(null, 'delete rquest successfully' , 204) ;

    }
}
