<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutUs::create([
            "description"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit",
            "image_1"=>"about-us-1.jpg",
            "image_2"=>"about-us-2.jpg",
        ]);
    }
}
