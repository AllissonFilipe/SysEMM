<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificacaoColab extends Model
{
    protected $fillable = [
		'titulo', 'descricao', 'tipo','categoria','id_colaborador','id_aluno','id_turma'
    ];
    protected $guarded = ['id','created_at','update_at'];
}
