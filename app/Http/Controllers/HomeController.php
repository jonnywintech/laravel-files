<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $files = Storage::files("public");
        $docFiles = array();
        foreach ($files as $key => $val) {
            $val = str_replace("public/", "", $val);
            array_push($docFiles, $val);
        }
        $folders = Storage::directories("public");
        $folderList = array();
        foreach ($folders as $key => $val) {
            $val = str_replace("public/", "", $val);
            array_push($folderList, $val);
        }

        return view('home', compact('docFiles', 'folderList'));
    }

    public function indexAction($folder)
    {
        // dd($folder);
        $files = Storage::files("public");


        return view('home', compact('docFiles', 'folderList'));
    }
}
