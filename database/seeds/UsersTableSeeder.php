<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Allisson Filipe',
            'email'     => 'allissonfiilipe@gmail.com',
            'password'  => bcrypt('01201337'),
            'tipo'      => 'Coordenador',
            'cpf'       => '10252587452',
            'data_de_nascimento' => '1994-12-30',
            'telefone'  => 34380672,
            'cep'       => 53444200,
            'numero'    => 166,
            'logradouro'=> 'rua 40',
            'complemento' => 'em frente ao campo',
            'bairro'    => 'maranguape I',
            'cidade'    => 'Paulista',
            'uf'        => 'PE',
            'ativo'     => true
        ]);

        User::create([
            'name'      => 'Outro Usuário',
            'email'     => 'contato@especializati.com.br',
            'password'  => bcrypt('123456'),
            'tipo'      => 'Coordenador',
            'cpf'       => '10852597451',
            'data_de_nascimento' => '1994-11-21',
            'telefone'  => 34390677,
            'cep'       => 53454200,
            'numero'    => 168,
            'logradouro'=> 'TESTE',
            'complemento' => 'em TESTE ao campo',
            'bairro'    => 'TESTE I',
            'cidade'    => 'TESTE',
            'uf'        => 'TE',
            'ativo'     => true
        ]);

        User::create([
            'name'      => 'Tairine Mousinho',
            'email'     => 'tairine@gmail.com',
            'password'  => bcrypt('123456'),
            'tipo'      => 'Professor',
            'cpf'       => '41322068070',
            'data_de_nascimento' => '1984-07-11',
            'telefone'  => 34340877,
            'cep'       => 53454500,
            'numero'    => 170,
            'logradouro'=> 'rua teste',
            'complemento' => 'Perto da Lojinha',
            'bairro'    => 'Bairro Novo',
            'cidade'    => 'Olinda',
            'uf'        => 'PE',
            'ativo'     => true
        ]);

        User::create([
            'name'      => 'Josué',
            'email'     => 'josue@gmail.com',
            'password'  => bcrypt('123456'),
            'tipo'      => 'Professor',
            'cpf'       => '02229084089',
            'data_de_nascimento' => '1994-07-07',
            'telefone'  => 35398677,
            'cep'       => 53454800,
            'numero'    => 200,
            'logradouro'=> 'Na Rua floriano',
            'complemento' => 'Perto da Sorveteria',
            'bairro'    => 'Santo Amaro',
            'cidade'    => 'Recife',
            'uf'        => 'PE',
            'ativo'     => true
        ]);
    }
}
