<?php

namespace App\Http\Controllers\Chef;

use App\Http\Controllers\Controller;
use App\Models\Plate;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait ;
class PlateController extends Controller
{
    use ApiResponseTrait ;
    public function store(Request $request){
        $plate = Plate::create($request->all());
        return $this->ApiResponse($plate , 'store plate succesfuly' , 201);
    }
    public function show($id)
    {
        $dishes = Plate::where('chef_id' , $id)->get();
        return $this->ApiResponse($dishes , 'show successfully plate' , 200);

    }

    public function edit($id)
    {
        $dishe = Plate::findOrfail( $id);
        return $this->ApiResponse($dishe , 'edit successfully plate' , 200);

    }

    public function update(Request $request, string $id)
    {
        $dishe = Plate::findOrfail( $id);
        $dishe->update($request->all());
        return $this->ApiResponse($dishe , 'update successfully plate' , 200);
    }

    public function destroy($id)
    {
        Plate::destroy($id);
        return $this->ApiResponse(null , 'update successfully plate' , 204);
    }
}
