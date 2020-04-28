<?php

namespace App\Http\Controllers;

use App\Art;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class ArtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arts = Art::all();
        return view('arts.index',compact('arts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('arts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'      =>  ['required', 'string', 'max:16', 'unique:arts,nama'],
            'ikon'      =>  ['required', 'string', 'max:32'],
            'deskripsi' =>  ['required', 'string'],
            'gambar'    =>  ['nullable', 'image', 'mimes:jpeg,png,gif', 'max:2048']
        ]);

        if ($request->gambar) {
            $data['gambar'] = $request->gambar->store('public/art');
        } else {
            $data['gambar'] = 'public/noimage.jpg';
        }

        $art = Art::create($data);
        return redirect()->route('arts.show', $art)->with('success', 'Art berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Art  $art
     * @return \Illuminate\Http\Response
     */
    public function show(Art $art)
    {
        return view('arts.show', compact('art'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Art  $art
     * @return \Illuminate\Http\Response
     */
    public function edit(Art $art)
    {
        return view('arts.edit', compact('art'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Art  $art
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Art $art)
    {
        $data = $request->validate([
            'nama'      =>  ['required', 'string', 'max:16', Rule::unique('arts','nama')->ignore($art->id)],
            'ikon'      =>  ['required', 'string', 'max:32'],
            'deskripsi' =>  ['required', 'string'],
            'gambar'    =>  ['nullable', 'image', 'mimes:jpeg,png,gif', 'max:2048']
        ]);

        if ($request->gambar) {
            if ($art->gambar != 'public/noimage.jpg') {
                File::delete(storage_path('app/'.$art->gambar));
            }
            $data['gambar'] = $request->gambar->store('public/art');
        } else {
            $data['gambar'] = $art->gambar;
        }

        $art->update($data);
        return redirect()->route('arts.show', $art)->with('success', 'Art berhasil perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Art  $art
     * @return \Illuminate\Http\Response
     */
    public function destroy(Art $art)
    {
        if ($art->gambar != 'public/noimage.jpg') {
            File::delete(storage_path('app/'.$art->gambar));
        }
        $art->delete();
        return redirect()->route('arts.index')->with('success', 'Art Berhasil dihapus');
    }
}
