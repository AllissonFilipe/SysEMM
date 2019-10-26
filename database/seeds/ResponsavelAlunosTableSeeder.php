<?php

use Illuminate\Database\Seeder;
use App\Models\ResponsavelAluno;

class ResponsavelAlunosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ResponsavelAluno::create([
            'aluno_id'        => 1,
            'responsavel_id'  => 8
        ]);

        ResponsavelAluno::create([
            'aluno_id'        => 2,
            'responsavel_id'  => 3
        ]);

        ResponsavelAluno::create([
            'aluno_id'        => 3,
            'responsavel_id'  => 5
        ]);

        ResponsavelAluno::create([
            'aluno_id'        => 4,
            'responsavel_id'  => 1
        ]);

        ResponsavelAluno::create([
            'aluno_id'        => 5,
            'responsavel_id'  => 7
        ]);

        ResponsavelAluno::create([
            'aluno_id'        => 6,
            'responsavel_id'  => 4
        ]);

        ResponsavelAluno::create([
            'aluno_id'        => 7,
            'responsavel_id'  => 3
        ]);

        ResponsavelAluno::create([
            'aluno_id'        => 8,
            'responsavel_id'  => 2
        ]);

        ResponsavelAluno::create([
            'aluno_id'        => 9,
            'responsavel_id'  => 6
        ]);

        ResponsavelAluno::create([
            'aluno_id'        => 10,
            'responsavel_id'  => 3
        ]);
    }
}
