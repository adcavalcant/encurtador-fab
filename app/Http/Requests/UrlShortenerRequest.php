<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UrlShortenerRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'original_url' => ['required', 'url', 'min:10', 'max:2048'],
            'custom_slug' => ['nullable','regex:/^[^\\/\\\\]+$/u',
            ]
        ];
    }

    public function messages()
    {
        return [
            'original_url.required' => 'O campo URL é obrigatório.',
            'original_url.url' => 'Por favor, insira uma URL válida.',
            'original_url.min' => 'A URL deve ter no mínimo 10 caracteres',
            'original_url.max' => 'A URL não pode ter mais de 2048 caracteres.',
            'custom_slug.regex' => 'O campo Fragmento Personalizado deve conter apenas letras, números, símbolos e não pode conter "/" ou "\\"',
        ];
    }
}
