<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_manager  = Role::where('name', 'manager')->first();
        $role_client  = Role::where('name', 'client')->first();

        $manager = new User();
        $manager->name = 'Manager';
        $manager->email = 'manager@small.kz';
        $manager->password = Hash::make('password');
        $manager->email_verified_at = time();
        $manager->save();
        $manager->roles()->attach($role_manager);

        $client = new User();
        $client->name = 'Ilyas';
        $client->email = 'ilijas9813@gmail.com';
        $client->password = Hash::make('ilyas123');
        $client->email_verified_at = time();
        $client->save();
        $client->roles()->attach($role_client);
    }
}
