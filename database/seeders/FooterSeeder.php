<?php

namespace Database\Seeders;

use App\Models\Footer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Footer::create([
            "description"=>null,
            "address"=>"123 Main Street, Anytown, CA 12345 USA",
            "phone"=>"(800) 123-4567",
            "email"=>"tes@m.com",
            "twitter_link"=>"#",
            "facebook_link"=>"#",
            "instagram_link"=>"#",
        ]);


    }
}
