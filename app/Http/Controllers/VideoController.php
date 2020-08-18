<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VideoController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profil = Profile::find(1);
        $api_key = config('api.key');
        if ($api_key != "KOSONG") {
            Video::truncate();
            $apiUrl = "https://www.googleapis.com/youtube/v3/search?";
            $part = "part=snippet";
            $channelId = "&channelId={$profil->channel_id}";
            $key = "&key={$api_key}";
            $maxResults = "&maxResults=50";
            $nextPageToken = "&pageToken=";
            $reload = true;

            $youtube = Http::get("{$apiUrl}{$part}{$channelId}{$key}{$maxResults}{$nextPageToken}");
            $youtubeList = $youtube->json();

            if (array_key_exists('items',$youtubeList)) {
                if (array_key_exists('nextPageToken',$youtubeList)) {
                    $nextPageToken = "&pageToken={$youtubeList['nextPageToken']}";
                } else {
                    $reload = false;
                }

                foreach ($youtubeList['items'] as $key => $value) {
                    if (array_key_exists('videoId',$value['id'])) {
                        Video::create([
                            'gambar'        => $value['snippet']['thumbnails']['high']['url'],
                            'video_id'      => $value['id']['videoId'],
                            'caption'       => $value['snippet']['title'],
                            'published_at'  => date('Y-m-d H:i:s',strtotime($value['snippet']['publishedAt'])),
                        ]);
                    }
                }

                while ($reload) {
                    $youtube = Http::get("{$apiUrl}{$part}{$channelId}{$key}{$maxResults}{$nextPageToken}");
                    $youtubeList = $youtube->json();
                    if (array_key_exists('nextPageToken',$youtubeList)) {
                        $nextPageToken = "&pageToken={$youtubeList['nextPageToken']}";
                    } else {
                        $reload = false;
                    }

                    foreach ($youtubeList['items'] as $key => $value) {
                        if (array_key_exists('videoId',$value['id'])) {
                            Video::create([
                                'gambar'        => $value['snippet']['thumbnails']['high']['url'],
                                'video_id'      => $value['id']['videoId'],
                                'caption'       => $value['snippet']['title'],
                                'published_at'  => date('Y-m-d H:i:s',strtotime($value['snippet']['publishedAt'])),
                            ]);
                        }
                    }
                }

                return back()->with('success', 'Video berhasil disinkronisasi');
            } else {
                return back()->with('api_error', $youtubeList['error']['message']);
            }
        } else {
            return back()->with('error', 'Harap memasukkan API KEY pada .env');
        }
    }

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

        return back()->with('success', 'Video berhasil diperbarui');
    }
}
