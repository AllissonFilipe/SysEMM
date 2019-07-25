<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Disciplina;
use App\Models\TurmaAluno;

class Nota extends Model
{
    protected $fillable = [
		'nota', 'tipo', 'unidade','disciplina_id','turma_aluno_id'
    ];
    protected $guarded = ['id','created_at','update_at'];

    public function disciplina() {
      return $this->belongsTo(Disciplina::class);
    }

    public function turmaAluno() {
      return $this->belongsTo(TurmaAluno::class);
    }
}
