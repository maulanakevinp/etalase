<?php

use Illuminate\Database\Seeder;

class Structure extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('structure')->insert([
            'nama' => 'Cyril Adib Furqontol',            
            'Jabatan' => 'Ketua Umum',            
            'NIA' => 'UKMKE.4.2017.9',                        
        ]);
        DB::table('structure')->insert([
            'nama' => 'Niki Bocil',            
            'Jabatan' => 'Sekretaris Umum',            
            'NIA' => 'UKMKE5.2018.2',            
        ]);
        DB::table('structure')->insert([
            'nama' => 'Nilam Pelosok',            
            'Jabatan' => 'Bendahara Umum',            
            'NIA' => 'UKMKE.4.2017.18',            
        ]);
    }
}
