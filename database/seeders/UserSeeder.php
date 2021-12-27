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
            'name' => 'Gerend Geraldo',
            'Email' => 'gerendgabriel@gmail.com',
            'password' => Hash::make('123123'),
            'Address' => 'jalan-jalan',
            'Gender' => 'M',
            'role' => 'Admin',
        ]);
    }
}
