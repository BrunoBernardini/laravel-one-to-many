<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            "title" => "required|min:3|max:255",
            "content" => "required|min:10",
        ];
    }

    public function messages()
    {
        return [
            "title.required" => "Il campo Titolo è obbligatorio!",
            "title.min" => "Il campo titolo deve contenere almeno :min caratteri!",
            "title.required" => "Il campo Titolo è obbligatorio!",
            "content.required" => "Il contenuto è obbligatorio!",
            "content.min" => "Il contenuto deve avere almeno :min caratteri!",
        ];
    }
}
