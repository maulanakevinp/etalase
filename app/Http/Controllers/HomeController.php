<?php

namespace App\Http\Controllers;

use App\Image;
use App\m_structure;
use Illuminate\Http\Request;

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
        $structure = m_structure::get();
        return view('snapshot',compact('images' , 'structure'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $images = Image::orderBy('id','asc')->paginate(8);

        return view('index',compact('images' ));
    }
    public function structure(){
        $structure = m_structure::get();
        return view('structure',compact('structure'));
    }

}
