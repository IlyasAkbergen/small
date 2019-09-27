<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_client = new Role();
        $role_client ->name = 'client';
        $role_client ->description = 'A client\'s User';
        $role_client ->save();

        $role_manager = new Role();
        $role_manager->name = 'manager';
        $role_manager->description = 'A managers\'s User';
        $role_manager->save();
    }
}
