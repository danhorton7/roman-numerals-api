<?php

namespace App\Services;
use App\Services\IntegerConverterInterface;

class RomanNumeralConverter implements IntegerConverterInterface
{
    // set as a readonly property to protect the lookupTable from being inadvertent modification
    // as the application's architecture grows larger
    public readonly array $lookupTable;

    public function __construct()
    {
        $this->lookupTable = [
            'M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1,
        ];
    }

    /**
     * converts an integer to its roman numeral representation.
     *
     * uses the lookup table to map integers to roman numeral symbols
     *
     * @param int $integer the integer to convert (1–3999)
     * @return string the roman numeral representation of the integer
     */
    public function convertInteger(int $integer) : string
    {
        $result = '';

        foreach ($this->lookupTable as $symbol => $value) {
            while ($integer >= $value) {
                $result .= $symbol;
                $integer -= $value;
            }
        }

        return $result;
    }

}
