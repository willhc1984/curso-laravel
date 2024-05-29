<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => 'required',
            'price' => 'required|max:10'
        ];
    }

    public function messages(): array{
        return [
            'name.required' => 'Nome do curso é obrigatório!',
            'price.required' => 'Valor do preço é obrigatório!',
            'price.max' => 'O preço só pode ter no máximo 8 numeros!'
        ];
    }
}
