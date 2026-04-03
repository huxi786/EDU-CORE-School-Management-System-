<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait ImageUploadTrait
{
    /**
     * Kisi bhi qisam ki image upload karne ka function
     *
     * @param \Illuminate\Http\UploadedFile $image
     * @param string $folderName
     * @param string $disk
     * @return string|null
     */
    public function uploadImage($image, $folderName, $disk = 'public')
    {
        if ($image) {
            // 1. Ek unique naam banayen
            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = Str::slug($originalName) . '-' . time() . '.' . $image->getClientOriginalExtension();

            // 2. File ko storage mein save karein
            $path = $image->storeAs($folderName, $fileName, $disk);

            // 3. Database mein save karne ke liye path return karein
            return $path;
        }

        return null;
    }

    /**
     * Purani image delete karne ka function
     */
    public function deleteImage($imagePath, $disk = 'public')
    {
        if ($imagePath && \Illuminate\Support\Facades\Storage::disk($disk)->exists($imagePath)) {
            \Illuminate\Support\Facades\Storage::disk($disk)->delete($imagePath);
        }
    }
}   