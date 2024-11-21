<?php

namespace App\Http\Controllers\Chef;

use App\Actions\DeleteAttechment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\SaveAttachment;
use App\Models\ChefAttachment;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\File;
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



        $path = 'chef/plates_images/';
        $filePaths = [];
        
        if ($request->hasFile('img_plates')) {
            $files = $request->file('img_plates');
        
            foreach ($files as $file) {
                $fileName = uniqid()."_plate." . $file->getClientOriginalExtension();
                $file->storeAs($path, $fileName, 'attechment');
                $filePaths[] = $path . '/' . $fileName;
                ChefAttachment::create([
                    'chef_id' => $request->chef_id,
                    'file_name' => $path.$fileName ,
                    'file_type' => 'plates' ,
                ]);
            }
        }
        
        return $this->ApiResponse($filePaths , 'store images successfuly' , 201);
    
    }

   

    public function update(Request $request ){

            $old_Image = ChefAttachment::where('chef_id', $request->chef_id )->where('file_type', 'profile')->first();
            DeleteAttechment::execute($old_Image);
            
            $old_Images = ChefAttachment::where('chef_id', $request->chef_id )->where('file_type', 'plates')->get();

            foreach ($old_Images as $file) {
                DeleteAttechment::execute($file);
            } 

           
            
            return $this->store($request);

    
    }


    public function destroy($id)
    {
        $Image = ChefAttachment::find($id);
        DeleteAttechment::execute($Image);
        return $this->ApiResponse(null , 'store images successfuly' , 200);


    }
}
 