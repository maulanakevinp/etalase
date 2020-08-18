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
        $images = Image::orderBy('id','desc')->get();
        $videos = Video::all();
        $galleries = array();

        foreach ($images as $key => $value) {
            $gambar = [
                'gambar'    => $value->image,
                'id'        => $value->id,
                'caption'   => "",
                'jenis'     => 1,
                'created_at'=> strtotime($value->created_at),
            ];
            array_push($galleries, $gambar);
        }

        foreach ($videos as $key => $value) {
            $gambar = [
                'gambar'    => $value->gambar,
                'id'        => $value->video_id,
                'caption'   => $value->caption,
                'jenis'     => 2,
                'created_at'=> strtotime($value->published_at),
            ];
            array_push($galleries, $gambar);
        }

        usort($galleries, function($a, $b) {
            return $a['created_at'] < $b['created_at'];
        });

        return view('images.index',compact('galleries'));
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
    public function destroy(Image $image)
    {
        File::delete(storage_path('app/'.$image->image));
        $image->delete();
        return back()->with('success','Foto berhasil dihapus');
    }
}
