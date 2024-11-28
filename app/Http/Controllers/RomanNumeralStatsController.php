<?php

namespace App\Http\Controllers;

use App\Http\Resources\RomanNumeralResource;
use App\Models\RomanNumeral;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class RomanNumeralStatsController extends Controller
{
    /**
     * returns the most recently converted integers, ordered by last_conversion
     * limited to 15
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */

    public function recent()
    {
        $recentConversions = RomanNumeral::orderBy('last_conversion', 'desc')->limit(15)->get();

        return RomanNumeralResource::collection($recentConversions);
    }

    /**
     * return the top 10 most frequently converted integers
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function topConversions() : AnonymousResourceCollection
    {
        $topConversions = RomanNumeral::orderBy('total_conversions', 'desc')->limit(10)->get();

        return RomanNumeralResource::collection($topConversions);
    }
}
