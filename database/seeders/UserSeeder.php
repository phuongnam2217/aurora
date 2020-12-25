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
        $user->name = "phuongnam";
        $user->username = "phuongnam";
        $user->password = Hash::make('123123');
        $user->email = "madlifess217@gmail.com";
        $user->address = "Saigon";
        $user->phone = "123123123";
        $user->role_id = 1;
        $user->status = 1;
        $user->save();
    }
}
