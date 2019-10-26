<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Aluno;
use App\Models\Responsavel;

class ResponsavelAluno extends Model
{
    protected $fillable = [
        'aluno_id', 'responsavel_id'
    ];

    protected $guarded = ['id','created_at','update_at'];   
}

