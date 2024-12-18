<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetRomanNumeralRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules() : array
    {
        return [
            'number' => 'required|integer|min:1|max:3999'
        ];
    }
}
