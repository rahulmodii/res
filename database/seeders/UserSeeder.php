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
        User::create([
            'name'=>'rahul',
            'user_type'=>'admin',
            'mobile'=>'7340288277',
            'email'=>'restaurant@gmail.com',
            'password'=>Hash::make('123456'),
        ]);
    }
}
