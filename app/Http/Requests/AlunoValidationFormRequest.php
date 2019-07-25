<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunoValidationFormRequest extends FormRequest
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
            'nome' => 'required|string|max:255',
            'data_de_nascimento' => 'required|date|before:today',
            'sexo' => 'required',
            'rg' => 'required|numeric',
            'cpf' => 'required|numeric|cpf',
            'senha' => 'required|max:20'
        ];
    }
}
