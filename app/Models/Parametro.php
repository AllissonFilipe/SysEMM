<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parametro extends Model
{
    protected $fillable = [
		'chave', 'tipo', 'valor_inteiro','valor_decimal','valor_data','valor_logico','valor_texto'
    ];

    protected $guarded = ['id','created_at','update_at'];
}
