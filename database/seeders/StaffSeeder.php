<?php

namespace Database\Seeders;

use App\Models\Staff;
use App\Models\Position;
use App\Models\WorkingTime;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as FakerFactory;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();

        $working_date = WorkingTime::pluck('id')->toArray();
        $position_ids_array = Position::pluck('id')->toArray();
        for ($i=0; $i < 30; $i++) {
            Staff::create([
                'name' => $faker->name,
                'position_id' => $position_ids_array[array_rand($position_ids_array)],
                'phone' => $faker->phoneNumber,
                'salary' => rand(100,1000),
                'working_time_id' => $working_date[array_rand($working_date)],
            ]);
        }
    }
}
