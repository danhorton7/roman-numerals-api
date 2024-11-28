<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RomanNumeral;

class RomanNumeralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        /// generate 50 random records
        RomanNumeral::factory()->count(50)->create();
    }
}
