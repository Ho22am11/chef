<?php

namespace App\Http\Controllers\Chef;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait ;
class CalendarController extends Controller
{
    use ApiResponseTrait ;
    public function store(Request $request){
        $calendar = Calendar::create($request->all());
        return $this->ApiResponse($calendar , 'calender store successfuly' , 201);
    }

    public function show_data(Request $request){
        try{
        $availability = Calendar::where('chef_id', $request->chef_id)->whereMonth('day', $request->month)->whereYear('day', $request->year)->get();
        return $this->ApiResponse($availability , 'show successfully calendar' , 200);
        }
        catch(\Exception $e){
            return response()->json([
                'error' => 'Something went wrong',
                'message' => $e->getMessage()], 500);
        }
    }

    public function edit(Request $request , $id)
    {
        $availability = Calendar::where('chef_id', $id)->where('day', $request->day)->first();
        return $this->ApiResponse($availability , 'show successfully calendar' , 200);
    }

    public function update(Request $request, $id)
    {
        try{
        $calendar = Calendar::findOrFail($id);
        $calendar->update($request->all());
        return $this->ApiResponse($calendar , 'update successfully calendar' , 201);
        }
        catch(\Exception $e){
            return response()->json([
                'error' => 'Something went wrong',
                'message' => $e->getMessage()], 500);
        }
    }

    
}
