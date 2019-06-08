<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\NotificacaoColab;

class Aluno extends Model
{
    protected $fillable = [
		'nome', 'cpf', 'data_de_nascimento','cep','numero','logradouro','complemento','bairro','cidade','uf'
    ];
    protected $guarded = ['id','created_at','update_at'];

    public function notificacao() {
      return $this->hasMany(NotificacaoColab::class);
  }
}
