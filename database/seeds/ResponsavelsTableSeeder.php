<?php

use Illuminate\Database\Seeder;
use App\Models\Responsavel;

class ResponsavelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Responsavel::create([
            'nome'               => 'Mônica',
            'cpf'                => 13555893041,
            'telefone'           => 32345432,
            'grau_de_parentesco' => 'Mãe',
            'cep'                => 53433070,
            'numero'             => 111,
            'logradouro'         => 'Rua Setenta',
            'complemento'        => 'Perto da rua inuino',
            'bairro'             => 'Arthur I',
            'cidade'             => 'Paulista',
            'uf'                 => 'PE',
            'ativo'              => true
        ]);

        Responsavel::create([
            'nome'               => 'Milena',
            'cpf'                => 51727764005,
            'telefone'           => 32343432,
            'grau_de_parentesco' => 'Mãe',
            'cep'                => 53423070,
            'numero'             => 131,
            'logradouro'         => 'Rua Oitenta',
            'complemento'        => 'Perto da rua inuo',
            'bairro'             => 'Arthur II',
            'cidade'             => 'Paulista',
            'uf'                 => 'PE',
            'ativo'              => true
        ]);

        Responsavel::create([
            'nome'               => 'Mario',
            'cpf'                => 52162679051,
            'telefone'           => 37345432,
            'grau_de_parentesco' => 'Pai',
            'cep'                => 53483070,
            'numero'             => 161,
            'logradouro'         => 'Rua cem',
            'complemento'        => 'Perto da padaria',
            'bairro'             => 'Arthur III',
            'cidade'             => 'Paulista',
            'uf'                 => 'PE',
            'ativo'              => true
        ]);

        Responsavel::create([
            'nome'               => 'Paulo',
            'cpf'                => 43350133029,
            'telefone'           => 32345932,
            'grau_de_parentesco' => 'Pai',
            'cep'                => 56433070,
            'numero'             => 231,
            'logradouro'         => 'Rua Vinte',
            'complemento'        => 'Perto do Porto',
            'bairro'             => 'Paratibe',
            'cidade'             => 'Paulista',
            'uf'                 => 'PE',
            'ativo'              => true
        ]);

        Responsavel::create([
            'nome'               => 'Mariana',
            'cpf'                => 99280935060 ,
            'telefone'           => 32345932,
            'grau_de_parentesco' => 'Tia',
            'cep'                => 53433077,
            'numero'             => 211,
            'logradouro'         => 'Rua Cinquenta',
            'complemento'        => 'Perto da rua',
            'bairro'             => 'Arthur IV',
            'cidade'             => 'Paulista',
            'uf'                 => 'PE',
            'ativo'              => true
        ]);

        Responsavel::create([
            'nome'               => 'Mara',
            'cpf'                => 20027540049,
            'telefone'           => 72345432,
            'grau_de_parentesco' => 'Tia',
            'cep'                => 53433770,
            'numero'             => 411,
            'logradouro'         => 'Rua milani',
            'complemento'        => 'Perto da rua inuino',
            'bairro'             => 'Arthur VIII',
            'cidade'             => 'Paulista',
            'uf'                 => 'PE',
            'ativo'              => true
        ]);

        Responsavel::create([
            'nome'               => 'Julio',
            'cpf'                => 13427519066,
            'telefone'           => 32345482,
            'grau_de_parentesco' => 'Tio',
            'cep'                => 54433070,
            'numero'             => 51,
            'logradouro'         => 'Rua Onze',
            'complemento'        => 'Perto de campo',
            'bairro'             => 'Jardim',
            'cidade'             => 'Paulista',
            'uf'                 => 'PE',
            'ativo'              => true
        ]);

        Responsavel::create([
            'nome'               => 'Clara',
            'cpf'                => 81621519074,
            'telefone'           => 12345432,
            'grau_de_parentesco' => 'Avó',
            'cep'                => 55433070,
            'numero'             => 11,
            'logradouro'         => 'Rua Augusta',
            'complemento'        => 'Perto da rua inuino',
            'bairro'             => 'Arthur I',
            'cidade'             => 'Paulista',
            'uf'                 => 'PE',
            'ativo'              => true
        ]);

        Responsavel::create([
            'nome'               => 'Latios',
            'cpf'                => 77455142072,
            'telefone'           => 32345432,
            'grau_de_parentesco' => 'Pai',
            'cep'                => 63433070,
            'numero'             => 2,
            'logradouro'         => 'Rua Justa',
            'complemento'        => 'Perto de Loteria',
            'bairro'             => 'Maranguape II',
            'cidade'             => 'Paulista',
            'uf'                 => 'PE',
            'ativo'              => true
        ]);
    }
}
