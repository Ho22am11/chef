<?php

namespace App\Actions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SaveAttachment{

    public static  function execute(Request $request, $fileKey , $path)
    {
        $file = $request->file($fileKey);
        
        $fileName = time(). "_$fileKey." .$file->getClientOriginalExtension();

        $file->storeAs($path, $fileName, 'attechment');

        $img_loction = $path.'/'.$fileName;


         $data = $request->all();
         $data['img'] =  $img_loction;

         return $data ;

        
    }

}