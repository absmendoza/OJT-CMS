<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'User')->first();
        $role_admin = Role::where('name', 'Admin')->first();

        $admin = new User();
        $admin->firstname = 'Admin';
        $admin->lastname = 'Admin';
        $admin->email = 'admin@example.com';
        $admin->password = 'adminadmin';
        $admin->save();
        $admin->roles()->attach($role_admin); // attach a role to a user
    }
}
