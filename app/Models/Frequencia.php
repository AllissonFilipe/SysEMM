<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Frequencia extends Model
{
    protected $fillable = [
		'data_frequencia', 'presenca', 'disciplina_id','turma_aluno_id'
    ];
}