<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Aluno;
use App\Models\Turma;

class NotificacaoColab extends Model
{
    protected $fillable = [
		'titulo', 'descricao', 'tipo','categoria','id_colaborador','id_aluno','id_turma'
    ];
    protected $guarded = ['id','created_at','update_at'];

    public function user() {
      return $this->belongsTo(User::class);
    }

    public function aluno() {
      return $this->belongsTo(Aluno::class);
    }

    public function turma() {
      return $this->belongsTo(Turma::class);
    }
}
