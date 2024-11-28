<?php

namespace Database\Factories;

use App\Services\RomanNumeralConverter;
use App\Models\RomanNumeral;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RomanNumeral>
 */
class RomanNumeralFactory extends Factory
{

    // inject the rRomanNumeralConverter to allow conversion of our factory example records
    protected RomanNumeralConverter $romanNumeralConverter;

    public function __construct()
    {
        parent::__construct();
        $this->romanNumeralConverter = app(RomanNumeralConverter::class);
    }
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition() : array
    {
        $char_in = $this->faker->numberBetween(1, 3999);

        return [
            'char_in' => $char_in,
            'char_out' => $this->romanNumeralConverter->convertInteger($char_in), // Use helper function or service
            'total_conversions' => $this->faker->numberBetween(1, 50),
            'last_conversion' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
