<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Balance;
use App\Models\Historic;
use App\Models\NotificacaoColab;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password','tipo','cpf','data_de_nascimento','telefone','cep','numero','logradouro','complemento','bairro','cidade','uf'
    ];
    protected $guarded = ['id','created_at','update_at'];

    public function notificacoes() {
        return $this->hasMany(NotificacaoColab::class);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function balance()
    {
        return $this->hasOne(Balance::class);
    }

    public function historics()
    {
        return $this->hasMany(Historic::class);
    }

    public function getSender($sender)
    {
        return $this->where('name', 'LIKE', "%$sender%")
                        ->orWhere('email', $sender)
                        ->get()
                        ->first();
    }
}
