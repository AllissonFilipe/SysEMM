<?php

use Illuminate\Database\Seeder;
use App\Models\Turma;

class TurmasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Turma::create([
            'nome'        => '1ª Série',
            'turno'       => 'Manhã',
            'qtd_vagas'   => 25,
            'ano_letivo'  => 2019,
            'ativo'       => true
        ]);

        Turma::create([
            'nome'        => '2ª Série',
            'turno'       => 'Manhã',
            'qtd_vagas'   => 25,
            'ano_letivo'  => 2019,
            'ativo'       => true
        ]);

        Turma::create([
            'nome'        => '3ª Série',
            'turno'       => 'Manhã',
            'qtd_vagas'   => 25,
            'ano_letivo'  => 2019,
            'ativo'       => true
        ]);

        Turma::create([
            'nome'        => '4ª Série',
            'turno'       => 'Manhã',
            'qtd_vagas'   => 25,
            'ano_letivo'  => 2019,
            'ativo'       => true
        ]);

        Turma::create([
            'nome'        => '5ª Série',
            'turno'       => 'Manhã',
            'qtd_vagas'   => 25,
            'ano_letivo'  => 2019,
            'ativo'       => true
        ]);

        Turma::create([
            'nome'        => '6ª Série',
            'turno'       => 'Manhã',
            'qtd_vagas'   => 25,
            'ano_letivo'  => 2019,
            'ativo'       => true
        ]);
    }
}
