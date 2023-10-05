<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function uploadImage($image, $folder = null)
    {
        $file = $image;
        $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
        $file->move('./uploads/' . $folder, $fileName);
        return $fileName;
    }

    public function deleteImage($image, $folder = null)
    {
        if( $image != '' && file_exists('uploads/'.$folder.'/'.$image)){
            unlink('uploads/'.$folder.'/'.$image);
        }
    }
}
