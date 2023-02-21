<?php

namespace Database\Seeders;

use App\Models\Rooms;
use App\Models\RoomType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $num_rooms = 100;
        $room_nos = [];
        $room_type_ids = RoomType::pluck('id')->toArray();
        for ($i = 1; $i <= $num_rooms; $i++) {
            $room_nos[] = "R" . str_pad($i, 3, "0", STR_PAD_LEFT);
        };

        foreach($room_nos as $room_no){
            Rooms::create([
                'room_no' => $room_no,
                'room_type_id' => $room_type_ids[array_rand($room_type_ids)],
                'price_per_night' => rand(200,1500),
            ]);
        }
    }
}
