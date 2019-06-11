<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Nota;

class Disciplina extends Model
{
    protected $fillable = [
		'nome', 'descricao'
    ];
    protected $guarded = ['id','created_at','update_at'];

    public function notas() {
      return $this->hasMany(Nota::class);
  }
}
