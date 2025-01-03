<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait ImageHandler
{

    public function uploadImage(Request $request, $inputName, $directory)
    {
        if ($request->hasFile($inputName)) {
            $filename = time() . '_' . $request->file($inputName)->getClientOriginalName();
            $request->file($inputName)->storeAs($directory, $filename, 'public');
            return $filename;
        }
        return null;
    }

    public function updateImage(Request $request, $inputName, $directory, $currentImage = null)
    {
        if ($request->hasFile($inputName)) {
            if ($currentImage) {
                Storage::disk('public')->delete($directory . '/' . $currentImage);
            }
            return $this->uploadImage($request, $inputName, $directory);
        }
        return $currentImage;
    }

    public function deleteImage($directory, $imageName = null)
    {
        if ($imageName) {
            Storage::disk('public')->delete($directory . '/' . $imageName);
        }
    }
}
