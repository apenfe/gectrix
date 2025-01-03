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
            if ($currentImage && !$this->filter($currentImage)) {
                Storage::disk('public')->delete($directory . '/' . $currentImage);
            }
            return $this->uploadImage($request, $inputName, $directory);
        }
        return $currentImage;
    }

    public function deleteImage($directory, $imageName = null)
    {
        if ($imageName && !$this->filter($imageName)) {
            Storage::disk('public')->delete($directory . '/' . $imageName);
        }
    }

    private function filter($name) {
        if($name == 'awm.jpg'
            || $name == 'beretta92fs.jpg'
            || $name == 'coyote.jpg'
            || $name == 'hkg36e.jpg'
            || $name == 'm4a1.jpg'
            || $name == 'm249.jpg'
            || $name == 'scar-h.png'
            || $name == 'jeep.png'
            || $name == 'tank.jpeg'
            || $name == 'truck.jpeg'
        ) {
            return true;
        }
        return false;
    }
}
