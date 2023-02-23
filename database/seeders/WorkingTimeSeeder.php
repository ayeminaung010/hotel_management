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
        $work_date = ['8 AM - 12 AM','1 PM - 5 PM','5 PM - 9 PM','9 AM - 5AM',' 5AM - 8 AM ','Monday' , 'Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];

        foreach($work_date as $working){
            WorkingTime::create([
                'working_date' => $working,
            ]);
        }
    }
}
