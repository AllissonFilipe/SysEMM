<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\NotificacaoColab;

class Turma extends Model
{
    protected $fillable = [
		'nome', 'turno', 'qtd_vagas','ano_letivo'
    ];
    protected $guarded = ['id','created_at','update_at'];

    public function notificacao() {
      return $this->hasMany(NotificacaoColab::class);
  }
}
