<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $fillable = [
		'nome', 'tipo', 'unidade','data_nota','disciplina_id','turma_aluno_id'
    ];
    protected $guarded = ['id','created_at','update_at'];
}
