<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::orderBy('id','desc')->paginate(10);
        return view('images.index',compact('images'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required','image','mimes:jpeg,png,gif','max:2048'],
        ]);
        Image::create([
            'image' => $request->image->store('public/gallery')
        ]);
        return back()->with('success','Foto berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        File::delete(storage_path('app/'.$image->image));
        $image->delete();
        return back()->with('success','Foto berhasil dihapus');
    }
}
