<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $postions = [
            'Front Desk Clerk',
            'Porters',
            'Concierges',
            'Housekeeping',
            'Room Service',
            'Waiter/Waitress',
            'Kitchen Staff',
            'Supervisor of Guest Services',
            'Front Desk Supervisor',
            'Housekeeping Supervisor',
            'Kitchen Manager',
            'Restaurant Manager',
            'Executive Chef',
            'Marketing and Advertising',
            'Accounting',
            'Purchasing',
            'Event Planner',
            'Assistant Hotel Manager',
            'Hotel Manager'
        ];
        foreach($postions as $postion){
            Position::create([
                'name' => $postion
            ]);
        }
    }
}
