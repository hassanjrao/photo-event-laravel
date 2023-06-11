<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $admin= User::firstOrCreate(["email" => "admin@m.com"], [
            "name" => "Admin",
            "email" => "admin@m.com",
            "password" => bcrypt("password"),
        ]);
           
        $admin->assignRole("admin");

        $user= User::firstOrCreate(["email" => "hsn@m.com"],[
            "name" => "Hassan",
            "email" => "hsn@m.com",
            "password" => bcrypt("password"),
        ]);

        $user->assignRole("user");


    }
}
