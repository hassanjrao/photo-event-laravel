<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HeroSection::create([
            "first_heading"=>"WELCOME TO SNAP & MINGLE",
            "second_heading"=>"Professional Dating Portraits for all.",
            "intro_text"=>"Come to one of our events and see what it’s all about."
        ]);
    }
}
