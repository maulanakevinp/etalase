<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('structures')->insert([
            'nia'       => 'UKMKE.4.2017.9',
            'nama'      => 'Cyril Adib Furqoni',
            'jabatan'   => 'Ketua Umum',
            'image'     => 'noimage.jpg'
        ]);
        DB::table('structures')->insert([
            'nia'       => 'UKMKE.5.2018.2',
            'nama'      => 'Niki B',
            'jabatan'   => 'Sekretaris Umum',
            'image'     => 'noimage.jpg'
        ]);
        DB::table('structures')->insert([
            'nia'       => 'UKMKE.4.2017.18',
            'nama'      => 'Nilam Wahidah',
            'jabatan'   => 'Bendahara Umum',
            'image'     => 'noimage.jpg'
        ]);
    }
}
