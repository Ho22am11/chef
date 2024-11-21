<?php
namespace App\Actions;

Class DeleteAttechment{


    public static  function execute($old_Image){

        $path = 'E:/laragon/www/chef/storage/'.$old_Image->file_name; 

            if (file_exists($path)) {
                unlink($path);
            } else {
                return "File not found or invalid path: " . $path;
            }
           
            $old_Image->delete();
    }
}
