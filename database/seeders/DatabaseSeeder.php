<?php

namespace Database\Seeders;

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
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            HeroSectionSeeder::class,
            HeroSectionImageSeeder::class,
            AboutUsSeeder::class,
            FooterSeeder::class,
        ]);
    }
}
