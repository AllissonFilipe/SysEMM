<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\NotificacaoColab;
use App\Models\TurmaAluno;
use App\Models\Responsavel;

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

  public function responsavels() {
    return $this->belongsToMany(Responsavel::class,"responsavel_alunos","aluno_id","responsavel_id");
  }

  public function responsavelArray(){
    foreach ($this->responsavels as $responsavel){
        $responsavels[] = $responsavel->id;
    }
    return $responsavels;
}
}
