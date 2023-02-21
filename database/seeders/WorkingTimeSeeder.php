<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\WorkingTime;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WorkingTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $work_date = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];

        foreach($work_date as $working){
            WorkingTime::create([
                'working_date' => $working,
            ]);
        }
    }
}
