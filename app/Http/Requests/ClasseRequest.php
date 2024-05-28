<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClasseRequest extends FormRequest
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
    public function rules():array
    {
        return [
            'name' => 'required',
            'descricao' => 'required'
        ];
    }

    public function messages(): array{
        return [
            'name.required' => 'Nome da aula é obrigatório!',
            'descricao.required' => 'Descrição da aula é obrigatória!'
        ];
    }
}
