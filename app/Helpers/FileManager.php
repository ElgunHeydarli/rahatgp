<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;

class FileManager
{
    public static function fileUpload($file, $folder): string
    {
        $filename =  rand() . '_' . $file->getClientOriginalName();
        $file->move('uploads/' . $folder, $filename);
        return $filename;
    }

    public static function fileDelete($folder, $file): void
    {
        if (File::exists(public_path('uploads/' . $folder . '/' . $file))) {
            File::delete(public_path('uploads/' . $folder . '/' . $file));
        }
    }
}
