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
    public function index()
    {
        $images     = Image::orderBy('id','desc')->paginate(9);
        $structures = Structure::all();
        $arts       = Art::all();
        return view('index',compact('images' , 'structures', 'arts'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function gallery()
    {
        $images = Image::orderBy('id','desc')->paginate(8);
        return view('gallery',compact('images'));
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
