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
            'password'  => bcrypt('12345'),
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
            'name'      => 'Tairine Mousinho',
            'email'     => 'tairine@gmail.com.br',
            'password'  => bcrypt('12345'),
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
            'name'      => 'Mauro',
            'email'     => 'mauro@gmail.com',
            'password'  => bcrypt('12345'),
            'tipo'      => 'Coordenador',
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
            'name'      => 'Outro',
            'email'     => 'outro@gmail.com',
            'password'  => bcrypt('12345'),
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

        User::create([
            'name'      => 'Luciana',
            'email'     => 'luciana@gmail.com',
            'password'  => bcrypt('12345'),
            'tipo'      => 'Professor',
            'cpf'       => '44781042040',
            'data_de_nascimento' => '1994-09-07',
            'telefone'  => 35328677,
            'cep'       => 53444800,
            'numero'    => 204,
            'logradouro'=> 'Na Rua cucia',
            'complemento' => 'Perto da Pani',
            'bairro'    => 'Maranguape II',
            'cidade'    => 'Paulista',
            'uf'        => 'PE',
            'ativo'     => true
        ]);

        User::create([
            'name'      => 'Marcia',
            'email'     => 'marcia@gmail.com',
            'password'  => bcrypt('12345'),
            'tipo'      => 'Professor',
            'cpf'       => '68317274098',
            'data_de_nascimento' => '1991-05-11',
            'telefone'  => 35328677,
            'cep'       => 53444804,
            'numero'    => 234,
            'logradouro'=> 'Na Rua badali',
            'complemento' => 'Perto da fffff',
            'bairro'    => 'Tabajara',
            'cidade'    => 'Olinda',
            'uf'        => 'PE',
            'ativo'     => true
        ]);

        User::create([
            'name'      => 'Cacia',
            'email'     => 'cacia@gmail.com',
            'password'  => bcrypt('12345'),
            'tipo'      => 'Professor',
            'cpf'       => '52584465060',
            'data_de_nascimento' => '1990-06-11',
            'telefone'  => 39328677,
            'cep'       => 53445804,
            'numero'    => 254,
            'logradouro'=> 'Na Rua apolo',
            'complemento' => 'Perto da gfgfgf',
            'bairro'    => 'Paratibe',
            'cidade'    => 'Paulista',
            'uf'        => 'PE',
            'ativo'     => true
        ]);
    }
}
