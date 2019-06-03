<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserValidationFormRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'tipo' => 'required',
            'cpf' => 'required|numeric',
            'data_de_nascimento' => 'required',
            'telefone' => 'required|numeric',
            'cep' => 'required|numeric',
            'logradouro' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required'
        ]; 
    }
}
