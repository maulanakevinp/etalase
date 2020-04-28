<?php

use App\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
            'logo'      => 'public/logo/etalase.png',
            'judul'     => 'UKMK Etalase',
            'deskripsi' => 'Etalase adalah Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque ipsam quia architecto ad illo odio sapiente perferendis esse amet, maxime, necessitatibus ducimus. Inventore quis magnam commodi voluptas culpa exercitationem molestiae!',
            'sejarah'   => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque ipsam quia architecto ad illo odio sapiente perferendis esse amet, maxime, necessitatibus ducimus. Inventore quis magnam commodi voluptas culpa exercitationem molestiae!',
            'alamat'    => 'Jalan. Kalimantan No. 37, Kampus Tegalboto, Jember, Jawa Timur, 68121, Indonesia',
            'website'   => 'https://etalase.lavinza.me',
            'instagram' => 'https://instagram.com/etalase.gallery',
        ]);
    }
}
