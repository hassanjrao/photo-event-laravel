<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $host = Role::firstOrCreate(['name' => 'host']);
        $user = Role::firstOrCreate(['name' => 'user']);


        // users management permissions
        Permission::firstOrCreate(["name" => "view users"]);
        Permission::firstOrCreate(["name" => "create users"]);
        Permission::firstOrCreate(["name" => "edit users"]);
        Permission::firstOrCreate(["name" => "delete users"]);

        // roles management permissions
        Permission::firstOrCreate(["name" => "view roles"]);
        Permission::firstOrCreate(["name" => "create roles"]);
        Permission::firstOrCreate(["name" => "edit roles"]);
        Permission::firstOrCreate(["name" => "delete roles"]);

                            
        // events management permissions
        Permission::firstOrCreate(["name" => "view events"]);
        Permission::firstOrCreate(["name" => "create events"]);
        Permission::firstOrCreate(["name" => "edit events"]);
        Permission::firstOrCreate(["name" => "delete events"]);


        // assign permissions to roles

        // admin
        $admin->givePermissionTo("view users");
        $admin->givePermissionTo("create users");
        $admin->givePermissionTo("edit users");
        $admin->givePermissionTo("delete users");

        $admin->givePermissionTo("view roles");
        $admin->givePermissionTo("create roles");
        $admin->givePermissionTo("edit roles");
        $admin->givePermissionTo("delete roles");


        // host
        $admin->givePermissionTo("view events");
        $admin->givePermissionTo("create events");
        $admin->givePermissionTo("edit events");
        $admin->givePermissionTo("delete events");
    }
}
