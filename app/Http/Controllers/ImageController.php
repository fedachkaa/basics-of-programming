<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function uploadImage(Request $request)
    {
        $imgpath = request()->file('file')->store('images', 'public');
        return response()->json(['location' => "/storage/$imgpath"]);
    }
}
