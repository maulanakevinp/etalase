<?php

namespace App\Http\Controllers;

use App\Structure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class StructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $structures = Structure::all();
        return view('structures.index',compact('structures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('structures.create');
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
            'nia'       =>  ['required', 'string', 'max:16', 'unique:structures,nia'],
            'nama'      =>  ['required', 'string', 'max:32'],
            'jabatan'   =>  ['required', 'string', 'max:16'],
            'image'     =>  ['nullable', 'image', 'mimes:jpeg,png,gif', 'max:2048']
        ]);

        if ($request->image) {
            $data['image'] = $request->image->store('public/anggota');
        } else {
            $data['image'] = 'public/noavatar.jpg';
        }

        $structure = Structure::create($data);
        return redirect()->route('structures.show', $structure)->with('success', 'Strucuture berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Structure  $structure
     * @return \Illuminate\Http\Response
     */
    public function show(Structure $structure)
    {
        return view('structures.show', compact('structure'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Structure  $structure
     * @return \Illuminate\Http\Response
     */
    public function edit(Structure $structure)
    {
        return view('structures.edit', compact('structure'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Structure  $structure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Structure $structure)
    {
        $data = $request->validate([
            'nia'       =>  ['required', 'string', 'max:16', Rule::unique('structures','nia')->ignore($structure->id)],
            'nama'      =>  ['required', 'string', 'max:32'],
            'jabatan'   =>  ['required', 'string', 'max:16'],
            'image'     =>  ['nullable', 'image', 'mimes:jpeg,png,gif', 'max:2048']
        ]);

        if ($request->image) {
            if ($structure->image != 'public/noavatar.jpg') {
                File::delete(storage_path('app/'.$structure->image));
            }
            $data['image'] = $request->image->store('public/anggota');
        } else {
            $data['image'] = $structure->image;
        }

        $structure->update($data);
        return redirect()->route('structures.show', $structure)->with('success', 'Strucuture berhasil perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Structure  $structure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Structure $structure)
    {
        if ($structure->image != 'public/noavatar.jpg') {
            File::delete(storage_path('app/'.$structure->image));
        }
        $structure->delete();
        return redirect()->route('structures.index')->with('success', 'Structure Berhasil dihapus');
    }
}
