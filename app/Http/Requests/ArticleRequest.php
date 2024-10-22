<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'title' => 'required|max:255',
            'body' => 'required|max:500'

        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'Devi metterlo il titolo!',
            'title.max'=>'Al massimo 255 caratteri'
        ];
    }
}
