<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Aluno;
use App\Models\Turma;

class TurmaAluno extends Model
{
    protected $fillable = [
		'aluno_id','turma_id','ativo'
    ];
    protected $guarded = ['id','created_at','update_at'];

    public function aluno() {
      return $this->belongsTo(Aluno::class);
    }

    public function turma() {
      return $this->belongsTo(Turma::class);
    }

    public function notas() {
      return $this->hasMany(Nota::class);
  }
}
