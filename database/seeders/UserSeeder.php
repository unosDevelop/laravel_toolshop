<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
            'email_verified' => true,
            'birth_date' => '1990-01-01',
            'phone_number' => '1234567890',
            'address' => '123 Admin Street',
            'occupation' => 'Administrator',
            'email_verified_at' => now(),
        ]);
        User::create([
            'name' => 'Guest User',
            'email' => 'guest@guest.com',
            'password' => Hash::make('guest123'),
            'email_verified' => true,
            'birth_date' => '1990-01-01',
            'phone_number' => '1234567890',
            'address' => '123 Admin Street',
            'occupation' => 'Warehouse Keeper',
            'email_verified_at' => now(),
        ]);
    }
}

