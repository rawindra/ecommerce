<?php

namespace App\Traits;

use Image;

trait ImageTrait
{
    public function uploadImage($image)
    {
        $thumb = public_path() . '/uploads/images/products/thumb/';

        \File::makeDirectory($thumb, $mode = 0777, true, true);

        $name = $image->getClientOriginalName();
        $newName = date('ymdgis') . '_' . $name;
        $image->move(public_path() . '/uploads/images/products/main', $newName);

        $img = Image::make(public_path() . '/uploads/images/products/main/' . $newName);

        $img->resize(300, 300, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $img->save($thumb . $newName);

        return $newName;
    }

    public function deleteStoredImage($image)
    {
        $storedMainImage = public_path("/uploads/images/products/main/{$image}");
        $storedThumbImage = public_path("/uploads/images/products/thumb/{$image}");
        if (\File::exists($storedMainImage)) {
            unlink($storedMainImage);
        }
        if (\File::exists($storedThumbImage)) {
            unlink($storedThumbImage);
        }
    }
}
