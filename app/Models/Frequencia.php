<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Frequencia extends Model
{
    protected $fillable = [
		'data_frequencia', 'ausencia', 'disciplina_id','turma_aluno_id'
    ];
    protected $guarded = ['id','created_at','update_at'];
}
