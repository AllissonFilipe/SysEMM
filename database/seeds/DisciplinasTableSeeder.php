<?php

use Illuminate\Database\Seeder;
use App\Models\Disciplina;

class DisciplinasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Disciplina::create([
            'nome'       => 'Português',
            'descricao'  => 'Disciplina que estuda as línguas'
        ]);

        Disciplina::create([
            'nome'       => 'Matemática',
            'descricao'  => 'Disciplina que estuda os números'
        ]);

        Disciplina::create([
            'nome'       => 'Geografia',
            'descricao'  => 'Disciplina que estuda os relevos'
        ]);

        Disciplina::create([
            'nome'       => 'Biologia',
            'descricao'  => 'Disciplina que estuda a Vida'
        ]);

        Disciplina::create([
            'nome'       => 'Física',
            'descricao'  => 'Disciplina que estuda as leis da física'
        ]);

        Disciplina::create([
            'nome'       => 'Inglês',
            'descricao'  => 'Disciplina que estuda a língua inglesa'
        ]);

        Disciplina::create([
            'nome'       => 'História',
            'descricao'  => 'Disciplina que estuda o passado'
        ]);

        Disciplina::create([
            'nome'       => 'Artes',
            'descricao'  => 'Disciplina que estuda as artes contemporaneas'
        ]);

        Disciplina::create([
            'nome'       => 'Educação Física',
            'descricao'  => 'Disciplina para realizar exercícios'
        ]);

        Disciplina::create([
            'nome'       => 'Religião',
            'descricao'  => 'Disciplina que estuda a Religião'
        ]);
    }
}
