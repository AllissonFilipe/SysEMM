<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResponsavelValidationFormRequest extends FormRequest
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
            'cpf' => 'required|numeric|cpf',
            'telefone' => 'required|numeric',
            'grau_de_parentesco' => 'required',
            'cep' => 'required|numeric',
            'logradouro' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required',
            'senha' => 'required|max:20'
        ];
    }
}
