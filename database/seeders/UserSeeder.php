<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Truncate the users table to start fresh
        User::truncate();

        // Create an admin user
        User::create([
            'username' => 'admin',
            'level' => 'admin',
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(60),
        ]);

        // Create a regular user
        User::create([
            'username' => 'user',
            'level' => 'user',
            'password' => bcrypt('user'),
            'remember_token' => Str::random(60),
        ]);

        // Create an admin complaint user
        User::create([
            'username' => 'admincomplaint',
            'level' => 'complaint',
            'password' => bcrypt('admincomplaint'),
            'remember_token' => Str::random(60),
        ]);

        // Create an admin submission user
        User::create([
            'username' => 'adminsubmission',
            'level' => 'submission',
            'password' => bcrypt('adminsubmission'),
            'remember_token' => Str::random(60),
        ]);

        // Create an admin KTP user
        User::create([
            'username' => 'adminktp',
            'level' => 'ktp',
            'password' => bcrypt('adminktp'),
            'remember_token' => Str::random(60),
        ]);

        // Create an admin tax user
        User::create([
            'username' => 'admintax',
            'level' => 'tax',
            'password' => bcrypt('admintax'),
            'remember_token' => Str::random(60),
        ]);
    }
}
