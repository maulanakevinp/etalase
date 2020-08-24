<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Image;
use App\Profile;
use App\Video;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function updateGallery()
    {
        Gallery::truncate();

        $images = Image::all();
        $videos = Video::all();
        $galleries = array();

        foreach ($images as $value) {
            $gambar = [
                'gambar'    => asset(Storage::url($value->image)),
                'gallery_id'=> $value->id,
                'caption'   => "",
                'jenis'     => 1,
                'timestamp' => strtotime($value->created_at),
            ];
            array_push($galleries, $gambar);
        }

        foreach ($videos as $value) {
            $gambar = [
                'gambar'    => $value->gambar,
                'gallery_id'=> $value->video_id,
                'caption'   => $value->caption,
                'jenis'     => 2,
                'timestamp' => strtotime($value->published_at),
            ];
            array_push($galleries, $gambar);
        }

        usort($galleries, function($a, $b) {
            return $a['timestamp'] > $b['timestamp'];
        });

        foreach ($galleries as $value) {
            Gallery::create($value);
        }
    }

    public function updateVideo()
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
                do {
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
                } while ($reload);

                $this->updateGallery();

                return back()->with('success', 'Video berhasil disinkronisasi');
            } else {
                return back()->with('api_error', $youtubeList['error']['message']);
            }
        } else {
            return back()->with('error', 'Harap memasukkan API KEY pada .env');
        }
    }
}
