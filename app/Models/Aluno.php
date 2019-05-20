<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = [
		'nome', 'cpf', 'data_de_nascimento','cep','numero','logradouro','complemento','bairro','cidade','uf'
    ];
}
