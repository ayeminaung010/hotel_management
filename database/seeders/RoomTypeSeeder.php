<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = [
            [
                'name' => 'Single',
                'description' => 'A room assigned to one person. May have one or more beds.
                The room size or area of Single Rooms are generally between 37 m² to 45 m².'
            ],
            [
                'name' => 'Double',
                'description' => 'A room assigned to two people. May have one or more beds.
                The room size or area of Double Rooms are generally between 40 m² to 45 m².'
            ],
            [
                'name' => 'Triple',
                'description' => 'A room that can accommodate three persons and has been fitted with three twin beds, one double bed and one twin bed or two double beds.
                The room size or area of Triple Rooms are generally between 45 m² to 65 m²'
            ],
            [
                'name' => 'Quad',
                'description' => 'A room assigned to four people. May have two or more beds.
                The room size or area of Quad Rooms are generally between 70 m² to 85 m².'
            ],
            [
                'name' => 'Queen',
                'description' => 'A room with a queen-sized bed. May be occupied by one or more people.
                The room size or area of Queen Rooms are generally between 32 m² to 50 m².'
            ],
            [
                'name' => 'King',
                'description' => 'A room with a king-sized bed. May be occupied by one or more people.
                The room size or area of King Rooms are generally between 32 m² to 50 m².'
            ],
            [
                'name' => 'Twin',
                'description' => 'A room with two twin beds. May be occupied by one or more people.
                The room size or area of Twin Rooms are generally between 32 m² to 40 m²'
            ],
            [
                'name' => 'King',
                'description' => 'A room assigned to one person. May have one or more beds.
                The room size or area of Single Rooms are generally between 37 m² to 45 m².'
            ],
            [
                'name' => 'Hollywood Twin Room',
                'description' => 'A room that can accommodate two persons with two twin beds joined together by a common headboard. Most of the budget hotels tend to provide many of these room settings which cater both couples and parties in two.
                The room size or area of Hollywood Twin Rooms are generally between 32 m² to 40 m².'
            ],
            [
                'name' => 'Double-double',
                'description' => 'A Room with two double ( or perhaps queen) beds. And can accommodate two to four persons with two twin, double or queen-size beds.
                The room size or area of Double-double / Double Twin rooms are generally between 50 m² to 70 m²'
            ],
            [
                'name' => 'Studio',
                'description' => ' A room with a studio bed- a couch which can be converted into a bed. May also have an additional bed.
                The room size or area of Studio room types are generally between 25 m² to 40 m².'
            ],
            [
                'name' => 'Suite / Executive Suite',
                'description' => 'A parlour or living room connected with to one or more bedrooms. (A room with one or more bedrooms and a separate living space.)
                The room size or area of Suite rooms are generally between 70 m² to 100 m².'
            ],
            [
                'name' => 'Mini Suite or Junior Suite',
                'description' => 'A single room with a bed and sitting area. Sometimes the sleeping area is in a bedroom separate from the parlour or living room.
                The room size or area of Junior Suites are generally between 60 m² to 80 m².'
            ],
            [
                'name' => 'President Suite | Presidential Suite',
                'description' => 'The most expensive room provided by a hotel. Usually, only one president suite is available in one single hotel property. Similar to the normal suites, a president suite always has one or more bedrooms and a living space with a strong emphasis on grand in-room decoration, high-quality amenities and supplies, and tailor-made services (e.g. personal butler during the stay).
                The room size or area of Presidential Suites are generally between 80 m² to 350 m².'
            ],
            [
                'name' => 'Apartments / Room for Extended Stay',
                'description' => 'This room type can be found in service apartments and hotels which target for long stay guests. Open kitchens, cooking equipment, dryer, washer etc. are usually available in the room. Housekeeping services are only provided once in a week or two times in a week.
                The room size or area of Serviced Apartments are generally between 96 m² to 250 m².'
            ],
            [
                'name' => 'Connecting rooms',
                'description' => 'Rooms with individual entrance doors from the outside and a connecting door between. Guests can move between rooms without going through the hallway.
                The room size or area of Connecting rooms are generally between 30 m² to 50 m².'
            ],
            [
                'name' => 'Murphy Room',
                'description' => 'A room that is fitted with a sofa bed or a Murphy bed (i.e. a bed that folds out of a wall or closet) which can be transformed from a bedroom in the night time to a living room in daytime.
                The room size or area of Murphy Room Types are generally between 20 m² to 40 m².'
            ],
            [
                'name' => 'Accessible Room',
                'description' => 'This room type is mainly designed for disabled guests and it is required by law that hotels must provide a certain number of accessible rooms to avoid discrimination.
                The room size or area of Accessible Room Types are generally between 30 m² to 42 m².'
            ],
            [
                'name' => 'Cabana',
                'description' => 'This type of room is always adjoining to the swimming pool or have a private pool attached to the room.
                The room size or area of Cabana Room Types are generally between 30 m² to 45 m²'
            ],
            [
                'name' => 'Adjoining rooms',
                'description' => 'Rooms with a common wall but no connecting door.
                The room size or area of Adjoining Room Types are generally between 30 m² to 45 m².'
            ],
            [
                'name' => 'Villa',
                'description' => 'A special form of accommodation which can be found in some resort hotels. It is a kind of stand-alone house which gives extra privacy and space to hotel guests. A fully equipped villa contains not only bedrooms and a living room but a private swimming pool, Jacuzzi and balcony. It is suitable for couples, families and large groups.
                The room size or area of Villa’s are generally between 100 m² to 150 m².'
            ],
            [
                'name' => 'Executive Floor/Floored Room',
                'description' => 'A room located on the ‘executive floor’ which enables convenient access to the executive lounge. Besides, some hotels also provide ‘female executive floors’ with their rooms assigned to female guests only due to safety and security reasons.
                The room size or area of Executive Floor are generally between 32 m² to 50 m².'
            ],
            [
                'name' => 'Smoking',
                'description' => 'Our hotels provide both smoking  rooms for their guests. In order to minimize the effects of secondhand smoke exposure on non-smoking guests.
                The room size or area of Smoking / Non-Smoking Room is generally between 30 m² to 250 m².'
            ],
            [
                'name' => 'Non-Smoking Room',
                'description' => 'Our hotels provide both  non-smoking rooms for their guests. In order to minimize the effects of secondhand smoke exposure on non-smoking guests.
                The room size or area of Smoking / Non-Smoking Room is generally between 30 m² to 250 m².'
            ],
        ];
        foreach($rooms as $room){
            RoomType::create([
                'name' => $room['name'],
                'description' => $room['description'],
                'price_per_night' => rand(200,1500),
            ]);
        }
    }
}
