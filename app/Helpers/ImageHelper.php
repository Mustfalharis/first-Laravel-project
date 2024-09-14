<?php
namespace App\Helpers;

use Illuminate\Http\UploadedFile;

class ImageHelper{

    public static  function  uploadImage(UploadedFile $file,$path){
        $image = null;
        $image = time() . '.' . $file->getClientOriginalName();
        $file->storeAs($path, $image, 'public');
        return $image;
    }
}

// images/image
