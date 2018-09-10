<?php

namespace App\Http\Controllers\File;

use App\Http\Controllers\Controller;
use App\Helpers\HelperFunc;
use Storage;

class FileController extends Controller
{
    /*
     * upload all file from local to s3
     */
    public function uploadToS3()
    {
        $dir = 'uploads';
        $files = Storage::disk('public')->allFiles($dir);
        
        if (!$files) {
            return;
        }
        $storagePath = Storage::disk('public')->getDriver()->getAdapter()->getPathPrefix();
        foreach ($files as $filePath) {
            if (!Storage::disk('s3')->exists($filePath)) {
                Storage::disk('s3')->put($filePath, file_get_contents($storagePath.$filePath), 'public');
                echo 'uploaded ' . $filePath . '<br />';
            } else {
                echo $filePath . ' exists <br />';
            }
        }
        echo 'uploaded complete <br />';
    }
    
    /*
     * test get file from s3
     */
    public function getFile($fileName)
    {
        return HelperFunc::getImageSrc($fileName);
    }
}
