<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Profile::findOrFail(1);
        return view('profile.index', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $profile = Profile::findOrFail(1);
        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $data = $request->validate([
            'judul'             => ['required', 'string', 'max:16'],
            'logo'              => ['nullable', 'image', 'mimes:png,jpg', 'max:2048'],
            'deskripsi'         => ['required', 'string'],
            'kalimat_pembuka'   => ['required', 'string'],
            'bidang'            => ['required', 'string'],
            'gallery'           => ['required', 'string'],
            'pengurus'          => ['required', 'string'],
            'contact'           => ['required', 'string'],
            'sejarah'           => ['required', 'string'],
            'alamat'            => ['nullable', 'string'],
            'kontak'            => ['nullable', 'string'],
            'email'             => ['nullable', 'string'],
            'website'           => ['nullable', 'string'],
            'instagram'         => ['nullable', 'string'],
            'facebook'          => ['nullable', 'string'],
            'twitter'           => ['nullable', 'string'],
        ]);

        if ($request->logo) {
            File::delete(storage_path('app/'.$profile->logo));
            $data['logo'] = $request->logo->store('public/logo');
        } else {
            $data['logo'] = $profile->logo;
        }


        $profile->update($data);
        return back()->with('success', 'Profile berhasil diperbarui');
    }
}
