<?php

namespace Database\Seeders;

use App\Models\HeroSectionImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSectionImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<4; $i++)
        {
            HeroSectionImage::create([
                "hero_section_id"=>1,
                "image"=>"hero-section-".($i+1).".jpg",
            ]);
        }
    }
}
