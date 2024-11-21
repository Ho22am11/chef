<?php

namespace App\Http\Controllers\Chef;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
class MenuController extends Controller
{
    use ApiResponseTrait ;
    public function store(Request $request){

        $menu = Menu::create($request->all());
        // add plate id in table menu_plate by relationship you do 
        $menu->plates()->attach($request->plates);


        return $this->ApiResponse($menu->load('plates') , 'store menu successfully' , 201 );
        
    }

    public function show($id){
        $menu = Menu::findOrFail($id);
        return $this->ApiResponse($menu->load('plates') , 'show menu successfully' , 200 );
    }


    public function update(Request $request , $id){

        $menu = Menu::findOrFail($id);
        $menu->update($request->all());

        // sync accept only array but attach accept array and json 
        $plateIds = collect($request->plates)->pluck('plate_id')->toArray();

        $menu->plates()->sync($plateIds);

        return $this->ApiResponse($menu->load('plates') , 'update menu successfully' , 200 );
        
    }


    public function destroy($id){
         Menu::destroy($id);
         return $this->ApiResponse(null  , 'delete menu successfully' , 200 );

    }
}
