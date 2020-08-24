<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $data = $request->validate([
            'channel_id'    => ['nullable', 'string' ,'max:64'],
        ]);

        $profil = Profile::find(1);
        $profil->update($data);
        $this->updateVideo();

        return back()->with('success', 'Video berhasil diperbarui');
    }
}
