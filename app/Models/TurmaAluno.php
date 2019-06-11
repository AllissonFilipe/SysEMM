<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Aluno;
use App\Models\Turma;

class TurmaAluno extends Model
{
    protected $fillable = [
		'dt_matricula', 'dt_cancelamento', 'aluno_id','turma_id'
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
