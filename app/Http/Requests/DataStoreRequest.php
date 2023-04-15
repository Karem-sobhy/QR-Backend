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
            '*.first_name' => 'required|alpha|max:255',
            '*.last_name' => 'required|alpha|max:255',
            '*.ssn' => 'required|regex:/^\d{3}-\d{2}-\d{4}$/',
            '*.test1' => 'required|integer|between:0,100',
            '*.test2' => 'required|integer|between:0,100',
            '*.test3' => 'required|integer|between:0,100',
            '*.test4' => 'required|integer|between:0,100',
            '*.final' => 'required|integer|between:0,100',
            '*.grade' => ['required','regex:/^[A-D][+-]?$|^F$/'],
        ];
    }
}
