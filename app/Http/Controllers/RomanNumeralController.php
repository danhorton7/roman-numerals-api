<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetRomanNumeralRequest;
use App\Http\Resources\RomanNumeralResource;
use App\Models\RomanNumeral;
use App\Services\RomanNumeralConverter;

class RomanNumeralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(GetRomanNumeralRequest $getRomanNumeralRequest, RomanNumeralConverter $romanNumeralConverter)
    {
        // use request->input() to grab the 'number' value to catch all potential http methods of accessing this endpoint
        $char_in = $getRomanNumeralRequest->input('number');

        $convertedNumber = $romanNumeralConverter->convertInteger($char_in);

        $conversionQuery = RomanNumeral::firstOrCreate(
            ['char_in' => $char_in],
            [
                // this part is only invoked if the records does not exist in the database, and sets the
                // remaining fields needed to create a new record.
                'char_out' => $convertedNumber,
                'total_conversions' => 1,
                'last_conversion' => now(),
            ]
        );

        // if record already exists, only increment the total_conversions and update the last_conversion date
        if (! $conversionQuery->wasRecentlyCreated) {
            $conversionQuery->increment('total_conversions', 1);
            $conversionQuery->last_conversion = now();
        }

        return new RomanNumeralResource($conversionQuery);
    }
}
