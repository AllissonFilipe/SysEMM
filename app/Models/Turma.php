<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $fillable = [
		'nome', 'turno', 'qtd_vagas','ano_letivo'
    ];
    protected $guarded = ['id','created_at','update_at'];
}
