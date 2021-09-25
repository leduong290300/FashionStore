<?php

namespace App\Http\Controllers\Upload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhotoProductController extends Controller
{
    public function uploadPhotoProduct (Request $request)
    {
        if($request->hasFile('upload')) {
            //get filename image
            $photoProductThumb = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $fileName = pathinfo($photoProductThumb, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            //Upload File
            $request->file('upload')->storeAs('public/images/product_thumb', $fileNameToStore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/images/product_thumb/' . $fileNameToStore);
            $msg = 'Image successfully uploaded';
            echo "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
        }
    }
}
