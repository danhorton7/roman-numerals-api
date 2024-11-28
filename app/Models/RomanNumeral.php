<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RomanNumeral extends Model
{
    /** @use HasFactory<\Database\Factories\RomanNumeralFactory> */
    use HasFactory;

    protected $fillable = ['char_in', 'char_out', 'total_conversions', 'last_conversion'];

    protected $casts = ['last_conversion' => 'datetime'];
}
