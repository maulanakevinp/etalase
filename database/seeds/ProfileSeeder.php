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
            'logo'              => 'public/logo/etalase.png',
            'judul'             => 'UKMK Etalase',
            'deskripsi'         => 'Etalase adalah Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque ipsam quia architecto ad illo odio sapiente perferendis esse amet, maxime, necessitatibus ducimus. Inventore quis magnam commodi voluptas culpa exercitationem molestiae!',
            'sejarah'           => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque ipsam quia architecto ad illo odio sapiente perferendis esse amet, maxime, necessitatibus ducimus. Inventore quis magnam commodi voluptas culpa exercitationem molestiae!',
            'kalimat_pembuka'   => 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts.',
            'bidang'            => 'Terdapat lima bidang seni di UKMK Etalase yang sehingga anggota dapat berproses sesuai ketertarikannya masing-masing',
            'gallery'           => 'Gallery Etalase adalah Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptas, laboriosam ut obcaecati officiis sequi earum perspiciatis nihil veritatis a amet?',
            'pengurus'          => 'Berikut adalah susunan kepengurusan UKMK Etalase periode 2019 - 2020',
            'contact'           => 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country.',
            'alamat'            => 'Jalan. Kalimantan No. 37, Kampus Tegalboto, Jember, Jawa Timur, 68121, Indonesia',
            'website'           => 'https://etalase.pesan-web.com',
            'instagram'         => 'https://instagram.com/etalase.gallery',
        ]);
    }
}
