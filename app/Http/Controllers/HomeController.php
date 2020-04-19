<?php

namespace App\Http\Controllers;

use App\Image;
use App\Structure;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $images = Image::orderBy('id','asc')->paginate(9);
        $structures = Structure::all();
        return view('snapshot',compact('images' , 'structures'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function gallery()
    {
        $images = Image::orderBy('id','asc')->paginate(8);
        return view('index',compact('images' ));
    }

    public function structure()
    {
        $structures = Structure::all();
        return view('structure',compact('structures'));
    }
}
