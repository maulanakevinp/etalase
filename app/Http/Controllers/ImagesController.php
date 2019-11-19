<?php

namespace App\Http\Controllers;

use App\Image;
use File;
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
        $images = Image::paginate(10);
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
            'image' => ['required','image','mimes:jpeg,png,gif'],
            'text'  => ['required']
        ]);
        Image::create([
            'image' => $this->setImageUpload($request->image,'img'),
            'text'  => $request->text
        ]);
        return back()->with('success','Foto berhasil ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        $request->validate([
            'image' => ['image','mimes:jpeg,png,gif'],
            'text'  => ['required']
        ]);
        if ($request->image) {
            $image->image = $this->setImageUpload($request->image,'img',$image->image);
        }
        $image->text = $request->text;
        $image->save();
        return back()->with('success','Foto berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        File::delete(public_path('img' . '/' . $image->image));
        $image->delete();
        return back()->with('success','Foto berhasil dihapus');
    }
}
