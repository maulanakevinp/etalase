<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(StructureSeeder::class);
        $this->call(ArtSeeder::class);
        $this->call(ProfileSeeder::class);
    }
}
