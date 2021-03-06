<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\NotificacaoColab;
use App\Models\TurmaAluno;
use App\Models\AlocarUser;

class Turma extends Model
{
    protected $fillable = [
		'nome', 'turno', 'qtd_vagas','ano_letivo','ativo'
    ];
    protected $guarded = ['id','created_at','update_at'];

    public function notificacaoColabs() {
      return $this->hasMany(NotificacaoColab::class);
    }

    public function matriculas() {
      return $this->hasMany(TurmaAluno::class);
    }

    public function alocarUsers() {
      return $this->hasMany(AlocarUser::class);
    }
}
