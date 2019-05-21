<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Responsavel extends Model
{
    protected $fillable = [
		'nome', 'email', 'senha','cpf','telefone','grau_de_parentesco'
    ];
}
