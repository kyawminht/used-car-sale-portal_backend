<?php
namespace App\Trait;

use Illuminate\Http\Request;

trait FileUploadTrait
{
    public function uploadFile(Request $request, $fileName, $directory)
    {
        if ($request->hasFile($fileName)) {
            $file = $request->file($fileName);
            $fileName = time() . '.' . $file->getClientOriginalExtension();

            // Store the file in the specified directory
            $file->storeAs('public/' . $directory, $fileName);

            return $fileName;
        }

        return null;
    }
}
