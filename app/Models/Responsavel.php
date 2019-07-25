<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Aluno;

class Responsavel extends Model
{
    protected $fillable = [
		'nome', 'email', 'senha','cpf','telefone','grau_de_parentesco','ativo'
    ];
    protected $guarded = ['id','created_at','update_at'];

    public function alunos() {
      return $this->belongsToMany(Aluno::class,"responsavel_alunos","aluno_id","responsavel_id");
    }
}
