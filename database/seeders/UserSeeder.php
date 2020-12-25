<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "admin";
        $user->username = "admin";
        $user->password = Hash::make('123123');
        $user->email = "admin@gmail.com";
        $user->address = "Saigon";
        $user->phone = "123123123";
        $user->role_id = 1;
        $user->status = 1;
        $user->save();
    }
}
