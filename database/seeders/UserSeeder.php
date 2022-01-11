<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $user = new User();
        $user->name = 'Super Admin';
        $user->email = 'a@gmail.com';
        $user->phone = '01488498441';
        $user->role_id = 1;
        $user->password = Hash::make(12456789);
        $user->created_at = Carbon::now()->toDateTimeString();
        $user->save();

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'b@gmail.com';
        $user->phone = '01488498442';
        $user->role_id = 2;
        $user->password = Hash::make(12456789);
        $user->created_at = Carbon::now()->toDateTimeString();
        $user->save();

        $user = new User();
        $user->name = 'Doctor';
        $user->email = 'c@gmail.com';
        $user->phone = '01488498443';
        $user->role_id = 3;
        $user->password = Hash::make(12456789);
        $user->created_at = Carbon::now()->toDateTimeString();
        $user->save();

        $user = new User();
        $user->name = 'Stuff';
        $user->email = 'd@gmail.com';
        $user->phone = '01488498444';
        $user->role_id = 4;
        $user->password = Hash::make(12456789);
        $user->created_at = Carbon::now()->toDateTimeString();
        $user->save();

        $user = new User();
        $user->name = 'Patient';
        $user->email = 'e@gmail.com';
        $user->phone = '01488498445';
        $user->role_id = 5;
        $user->password = Hash::make(12456789);
        $user->created_at = Carbon::now()->toDateTimeString();
        $user->save();
    }
}
