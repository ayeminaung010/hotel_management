<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'gender' => 'male',
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'ayeminaung',
            'email' => 'ayeminaung.mf@gmail.com',
            'password' => Hash::make('ayeminaung.mf@gmail.com'),
            'gender' => 'male',
            'role' => 'user',
        ]);
    }
}
