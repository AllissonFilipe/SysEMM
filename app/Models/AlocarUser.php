<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Turma;
use App\Models\Disciplina;
use App\User;

class AlocarUser extends Model
{
    protected $fillable = [
		'turma_id', 'disciplina_id', 'user_id'
    ];
    protected $guarded = ['id','created_at','update_at'];

    public function turma() {
        return $this->belongsTo(Turma::class);
    }
  
    public function disciplina() {
        return $this->belongsTo(Disciplina::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
