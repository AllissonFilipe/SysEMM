<?php

use Illuminate\Database\Seeder;
use App\Models\Aluno;

class AlunosTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Aluno::create([
            'nome'            => 'Silvia',
            'data_de_nascimento' => '2010-12-30',
            'sexo'            => 'Feminino',
            'rg'              => '330213076',
            'cpf'             => '09631335003',
            'senha'           => '12345',
            'ativo'           => true
        ]);

        Aluno::create([
            'nome'            => 'Manolo',
            'data_de_nascimento' => '2012-08-12',
            'sexo'            => 'Maculino',
            'rg'              => '357918137',
            'cpf'             => '96042560093',
            'senha'           => '12345',
            'ativo'           => true
        ]);

        Aluno::create([
            'nome'            => 'mathias',
            'data_de_nascimento' => '2009-07-08',
            'sexo'            => 'Masculino',
            'rg'              => '215626321',
            'cpf'             => '42275190040',
            'senha'           => '12345',
            'ativo'           => true
        ]);

        Aluno::create([
            'nome'            => 'Felipe',
            'data_de_nascimento' => '2011-11-11',
            'sexo'            => 'Masculino',
            'rg'              => '253631269',
            'cpf'             => '68540077043',
            'senha'           => '12345',
            'ativo'           => true
        ]);
        
        Aluno::create([
            'nome'            => 'Marta',
            'data_de_nascimento' => '2010-12-30',
            'sexo'            => 'Feminino',
            'rg'              => '351915631',
            'cpf'             => '48633230003',
            'senha'           => '12345',
            'ativo'           => true
        ]);

        Aluno::create([
            'nome'            => 'Nadila',
            'data_de_nascimento' => '2008-03-13',
            'sexo'            => 'Feminino',
            'rg'              => '309432029',
            'cpf'             => '16400118039',
            'senha'           => '12345',
            'ativo'           => true
        ]);

        Aluno::create([
            'nome'            => 'Marcio',
            'data_de_nascimento' => '2010-12-30',
            'sexo'            => 'Masculino',
            'rg'              => '136731788',
            'cpf'             => '50535102020',
            'senha'           => '12345',
            'ativo'           => true
        ]);

        Aluno::create([
            'nome'            => 'Cacio',
            'data_de_nascimento' => '2010-12-30',
            'sexo'            => 'Masculino',
            'rg'              => '390013006',
            'cpf'             => '26035107036',
            'senha'           => '12345',
            'ativo'           => true
        ]);

        Aluno::create([
            'nome'            => 'Tato',
            'data_de_nascimento' => '2012-01-12',
            'sexo'            => 'Masculino',
            'rg'              => '276776434',
            'cpf'             => '48613704000',
            'senha'           => '12345',
            'ativo'           => true
        ]);

        Aluno::create([
            'nome'            => 'Tatiana',
            'data_de_nascimento' => '2010-12-30',
            'sexo'            => 'Ferminino',
            'rg'              => '259851942',
            'cpf'             => '77347746019',
            'senha'           => '12345',
            'ativo'           => true
        ]);
    }
}
