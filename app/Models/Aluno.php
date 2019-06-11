<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\NotificacaoColab;
use App\Models\TurmaAluno;

class Aluno extends Model
{
    protected $fillable = [
		'nome', 'cpf', 'data_de_nascimento','cep','numero','logradouro','complemento','bairro','cidade','uf'
    ];
    protected $guarded = ['id','created_at','update_at'];

    public function notificacaoColabs() {
      return $this->hasMany(NotificacaoColab::class);
  }

  public function matriculas() {
    return $this->hasMany(TurmaAluno::class);
  }
}
