<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\StaffSeeder;
use Database\Seeders\CardTypeSeeder;
use Database\Seeders\PositionSeeder;
use Database\Seeders\RoomTypeSeeder;
use Database\Seeders\WorkingTimeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            PositionSeeder::class,
            RoomTypeSeeder::class,
            RoomsSeeder::class,
            WorkingTimeSeeder::class,
            StaffSeeder::class,
            CardTypeSeeder::class,
        ]);
    }
}
