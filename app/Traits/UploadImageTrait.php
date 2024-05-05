<?php
namespace App\Traits;
trait UploadImageTrait
{
    public function uploadImage($file,$stringPath)
    {
        if ($file){
            $fileIm = $file;
            $fileName = time() . rand(1000, 10000) . '.' . $file->getClientOriginalExtension();
            $fileLocation = getcwd() . '/' . $stringPath . '/';
            $file->move($fileLocation,$fileName);
            if(!$fileIm)
            {
                return FALSE;
            }
            return $fileName;
        }
    }
    public function _checkImageExist($file,$path){
        if($file != null && file_exists(public_path($path . $file))){
            unlink(public_path($path . $file));
        }
        return true;
    }
}
