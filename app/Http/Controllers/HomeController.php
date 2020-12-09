<?php

namespace App\Http\Controllers;

use App\Art;
use App\Gallery;
use App\Image;
use App\Profile;
use App\Structure;
use App\Video;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $structures = Structure::all();
        $profile = Profile::all();
        $arts       = Art::all();
        $images = Image::orderBy('id', 'desc')->get();
        $videos = Video::all();
        $galleries = array();

        foreach ($images as $key => $value) {
            $gambar = [
                'gambar'    => $value->image,
                'id'        => $value->id,
                'caption'   => "",
                'jenis'     => 1,
                'created_at' => strtotime($value->created_at),
            ];
            array_push($galleries, $gambar);
        }

        foreach ($videos as $key => $value) {
            $gambar = [
                'gambar'    => $value->gambar,
                'id'        => $value->video_id,
                'caption'   => $value->caption,
                'jenis'     => 2,
                'created_at' => strtotime($value->published_at),
            ];
            array_push($galleries, $gambar);
        }

        usort($galleries, function ($a, $b) {
            return $a['created_at'] < $b['created_at'];
        });
        return view('index', compact('galleries', 'structures', 'arts', 'profile'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function gallery()
    {
        return view('gallery');
    }

    public function galleryUpdate()
    {
        $this->updateGallery();
        return response()->json(['success'  => true]);
    }

    public function loadGallery()
    {
        $galleries = Gallery::orderBy('id', 'desc')->paginate(9);
        return response()->json($galleries);
    }

    public function structure()
    {
        $structures = Structure::all();
        return view('structure', compact('structures'));
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function anggota(Request $request){
        if($request->password == "etalase2020.web"){
            return redirect()->away('https://drive.google.com/file/d/1ZB1DT3Yw1DaiDMTXzhP_M6-bAGd3b0as/view?usp=sharing');
        }else{
            return back()->with('failed', 'Passoword Salah');
        }
    }
}
