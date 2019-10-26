<?php

use Illuminate\Database\Seeder;
use App\Models\NotificacaoColab;

class NotificacaoColabsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NotificacaoColab::create([
            'titulo'     => 'Festa Junina',
            'descricao'  => 'Esta festa será para os alunos e pais aproveitarem o período junino',
            'tipo'       => 'Geral',
            'categoria'  => 'Evento',
            'user_id'    => 1
        ]);

        NotificacaoColab::create([
            'titulo'     => 'Festa de Nata',
            'descricao'  => 'Esta festa será para os alunos e pais aproveitarem o período natalino',
            'tipo'       => 'Geral',
            'categoria'  => 'Evento',
            'user_id'    => 2
        ]);

        NotificacaoColab::create([
            'titulo'     => 'Carnaval',
            'descricao'  => 'no Carnaval teremos eventos incríveis para os nossos alunos',
            'tipo'       => 'Geral',
            'categoria'  => 'Evento',
            'user_id'    => 3
        ]);

        NotificacaoColab::create([
            'titulo'     => '7 de setembro',
            'descricao'  => 'Informamaos que amanha não haverá aula por conta do feriado',
            'tipo'       => 'Geral',
            'categoria'  => 'Aviso',
            'user_id'    => 1
        ]);

        NotificacaoColab::create([
            'titulo'     => 'Criança +',
            'descricao'  => 'Evento para doação de brinquedos para crianças carentes',
            'tipo'       => 'Geral',
            'categoria'  => 'Evento',
            'user_id'    => 3
        ]);

        NotificacaoColab::create([
            'titulo'     => 'Ano Letivo',
            'descricao'  => 'Estaremos realizando uma reunião para esclarecermos as ações que serão realizadas no ano letivo',
            'tipo'       => 'Geral',
            'categoria'  => 'Reunião',
            'user_id'    => 1
        ]);

        NotificacaoColab::create([
            'titulo'     => 'Festa da Vida',
            'descricao'  => 'Evento para comemorar a vida',
            'tipo'       => 'Geral',
            'categoria'  => 'Evento',
            'user_id'    => 2
        ]);

        NotificacaoColab::create([
            'titulo'     => 'Teste de incendio',
            'descricao'  => 'Estaremos simulando com os alunos um caso de incêndio',
            'tipo'       => 'Geral',
            'categoria'  => 'Aviso',
            'user_id'    => 1
        ]);
    }
}
