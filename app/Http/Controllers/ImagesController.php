<?php

namespace App\Http\Controllers;

use App\Image;
use App\Video;
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
        return view('images.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $photos = $request->file('file');

        if (!is_array($photos)) {
            $photos = [$photos];
        }

        for ($i = 0; $i < count($photos); $i++) {
            Image::create([
                'image' => $photos[$i]->store('public/gallery'),
            ]);
        }

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        File::delete(storage_path('app/'.$image->image));
        $image->delete();
        $this->updateGallery();
        return back()->with('success','Foto berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroys(Request $request)
    {
        foreach ($request->id as $id) {
            $image = Image::findOrFail($id);
            File::delete(storage_path('app/'.$image->image));
            $image->delete();
        }

        $this->updateGallery();
        return response()->json([
            'success' => true
        ]);
    }
}
