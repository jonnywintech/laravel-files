<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class StoreController extends Controller
{
    public function store(Request $request)
    {

        $request->file->store('public');
        return 'file has been uploaded';
    }

    function downloadFile($file_name)
    {
        $file = Storage::disk('public')->get($file_name);

        return (response($file, 200))
            ->header('Content-Type', 'document/txt');
    }
}
