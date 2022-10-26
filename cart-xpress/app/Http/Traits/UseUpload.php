<?php

namespace App\Http\Traits;

trait UseUpload {

    public function upload($file, $folderName) {
        if(!isset($file)) return null;

        $fileName = $file->getClientOriginalName();
        $newImageName = time() . '-' . $fileName;
        $file->move(public_path('images/' . $folderName), $newImageName);
        return '../images/' . $folderName . '/' . $newImageName;
    }

    public function getPath($path, $alternative) {
        if(isset($path)) return $path;
        return $alternative;
    }

    public function unsplashImage($id, $width, $height) {
        return 'https://source.unsplash.com/collection/928423/' . $width . 'x' . $height . '/?sig=' . $id;
    }

}