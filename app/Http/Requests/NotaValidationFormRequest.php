<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotaValidationFormRequest extends FormRequest
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
            'nota' => 'required',
            'tipo' => 'required',
            'unidade' => 'required',
            'data_nota' => 'required',
            'disciplina_id' => 'required',
            'turma_aluno_id' => 'required'
        ];
    }
}
