<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ImagenRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|max:20',
            'imagen' => 'required',
            'motivo' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'indique un titulo porfavor',
            'titulo.max' => 'El titulo puede contener hasta 20 caracteres',
            'imagen.required' => 'Seleccione una foto por favoar',
            'motivo.required' => 'Indique algun motivo',
        ];
    }
}
