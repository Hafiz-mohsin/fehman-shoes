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
        $fileName = $this->saveFile($file, $folder);
        // $file = $image;
        // $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
        // $file->move('./uploads/' . $folder, $fileName);
        return $fileName;
    }

    public function deleteImage($image, $folder = null)
    {
        if( $image != '' && file_exists('uploads/'.$folder.'/'.$image)){
            unlink('uploads/'.$folder.'/'.$image);
        }
    }
    public function updateImage($image, $old_image, $folder = null)
    {
        $file = $image;
        $fileName = $this->saveFile($file, $folder);
        if( $old_image != '' && file_exists('uploads/'.$folder.'/'.$old_image)){
            unlink('uploads/'.$folder.'/'.$old_image);
        }
        return $fileName;
    }
    public function saveFile($file, $folder)
    {
        $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
        $file->move('./uploads/' . $folder, $fileName);
        return $fileName;
    }


}
