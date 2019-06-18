<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Balance;
use App\Models\Historic;
use App\Models\NotificacaoColab;
use App\Models\AlocarUser;

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

    public function alocarUsers() {
        return $this->hasMany(AlocarUser::class);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getSender($sender)
    {
        return $this->where('name', 'LIKE', "%$sender%")
                        ->orWhere('email', $sender)
                        ->get()
                        ->first();
    }

}
