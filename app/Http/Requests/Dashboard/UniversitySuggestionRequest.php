<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UniversitySuggestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'alpha_two_code' => ['required', 'min:2', 'max:2'],
            'country' => 'required',
            'domains' => 'required',
            'name' => 'required',
            'web_pages' =>  'required'
        ];
    }
}
