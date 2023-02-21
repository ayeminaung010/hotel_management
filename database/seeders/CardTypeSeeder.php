<?php

namespace Database\Seeders;

use App\Models\IDCardType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CardTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $card_types =[
            "Driver's License",
            'Passport license',
            'Identification Card',
            "Voter's ID card",
            "Aadhar Card",
            'Student identification Card',
            'any other documents',
        ];
        foreach($card_types as $card_type){
            IDCardType::create([
                'card_type' => $card_type
            ]);
        }
    }
}
