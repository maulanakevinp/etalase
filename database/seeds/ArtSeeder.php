<?php

use App\Art;
use Illuminate\Database\Seeder;

class ArtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Art::create([
            'nama'      => 'MUSIK',
            'gambar'    => 'noimage.jpg',
            'deskripsi' => 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences.',
            'ikon'      => 'flaticon-music',
        ]);
        Art::create([
            'nama'      => 'TARI',
            'gambar'    => 'noimage.jpg',
            'deskripsi' => 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences.',
            'ikon'      => 'flaticon-belly-dance',
        ]);
        Art::create([
            'nama'      => 'PSM',
            'gambar'    => 'noimage.jpg',
            'deskripsi' => 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences.',
            'ikon'      => 'flaticon-choir',
        ]);
        Art::create([
            'nama'      => 'FOTOGRAFI',
            'gambar'    => 'noimage.jpg',
            'deskripsi' => 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences.',
            'ikon'      => 'flaticon-camera',
        ]);
        Art::create([
            'nama'      => 'TEATER',
            'gambar'    => 'noimage.jpg',
            'deskripsi' => 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences.',
            'ikon'      => 'flaticon-theater',
        ]);
    }
}
