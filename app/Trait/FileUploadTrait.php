<?php
namespace App\Trait;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait FileUploadTrait
{
    public function uploadFile(Request $request, $fileName, $directory)
    {
        if ($request->hasFile($fileName)) {
            $file = $request->file($fileName);

            // Handle single file
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/' . $directory, $fileName);

            return $fileName; // Return single file name as string
        }

        return null;
    }
}
