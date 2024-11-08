<?php

namespace App\Http\Controllers\Chef;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\SaveAttachment;
use App\Models\ChefAttachment;
use App\Traits\ApiResponseTrait;
class ProfileImageController extends Controller
{
    use ApiResponseTrait;
    public function store(Request $request){

        $data = SaveAttachment::execute($request , 'profile_image' , 'chef/profile image'); 
        ChefAttachment::create([
            'chef_id' => $request->chef_id,
            'file_name' => $data['img'],
            'file_type' => 'profile' ,
        ]);



        $path = 'chef/plates_images';
        $filePaths = [];
        
        if ($request->hasFile('img_plates')) {
            $files = $request->file('img_plates');
            $i =0 ;
        
            foreach ($files as $file) {
                $fileName = uniqid()."_plate." . $file->getClientOriginalExtension();
                $file->storeAs($path, $fileName, 'attechment');
                $filePaths[] = $path . '/' . $fileName;
                ChefAttachment::create([
                    'chef_id' => $request->chef_id,
                    'file_name' => $fileName ,
                    'file_type' => 'plates' ,
                ]);
            }
        }
        
        return $this->ApiResponse($filePaths , 'store images successfuly' , 201);
    
    }
}
 