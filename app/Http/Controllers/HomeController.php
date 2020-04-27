<?php

namespace App\Http\Controllers;

use App\Art;
use App\Image;
use App\Profile;
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
        $images     = Image::orderBy('id','asc')->paginate(9);
        $structures = Structure::all();
        $profile    = Profile::findOrFail(1);
        $arts       = Art::all();
        return view('snapshot',compact('images' , 'structures', 'profile', 'arts'));
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

    public function dashboard()
    {
        return view('dashboard');
    }
}
