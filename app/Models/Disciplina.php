<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $fillable = [
		'nome', 'descricao'
    ];
    protected $guarded = ['id','created_at','update_at'];
}
