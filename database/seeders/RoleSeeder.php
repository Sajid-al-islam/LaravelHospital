<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Role::truncate();

        $role = new Role();
        $role->name = 'Super Admin';
        $role->slug = 'super-admin';

        $role = new Role();
        $role->name = 'Admin';
        $role->slug = 'admin';

        $role = new Role();
        $role->name = 'Doctor';
        $role->slug = 'doctor';
    }
}
