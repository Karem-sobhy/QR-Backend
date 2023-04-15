<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            '*.First name' => 'required|alpha|max:255',
            '*.Last name' => 'required|alpha|max:255',
            '*.SSN' => 'required|regex:/^\d{3}-\d{2}-\d{4}$/',
            '*.Test1' => 'required|integer|between:0,100',
            '*.Test2' => 'required|integer|between:0,100',
            '*.Test3' => 'required|integer|between:0,100',
            '*.Test4' => 'required|integer|between:0,100',
            '*.Final' => 'required|integer|between:0,100',
            '*.Grade' => ['required','regex:/^[A-D][+-]?$|^F$/'],
        ];
    }
}
