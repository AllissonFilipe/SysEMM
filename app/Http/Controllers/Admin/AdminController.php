<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Aluno;
use App\User;
use App\Models\Turma;
use Khill\Lavacharts\Lavacharts;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function index()
    {
        $total_alunos = Aluno::all()->count();
        $total_professores = User::where('tipo','Professor')->count();
        $total_users = User::all()->count();
        $total_turmas = Turma::all()->count();
        
        // $alunos = Aluno::select(DB::raw("COUNT(*) as count , MONTHNAME(created_at) as month")) mysql
        $alunos = Aluno::select(DB::raw("COUNT(*) as count , MONTH(created_at) as month"))
        ->orderBy("created_at")
        ->groupBy(DB::raw("month(created_at)"))
        ->get()->toArray();
        $chart_array = array();
        foreach($alunos as $data){
        $n_data = [];
        array_push($n_data,$data['month'],$data['count']);
        array_push($chart_array,$n_data);
        }
        $lava = new Lavacharts;
        $popularity = $lava->DataTable();
        $popularity->addStringColumn('Country')
        ->addNumberColumn('Alunos')
        ->addRows($chart_array);
        $lava->LineChart('demochart', $popularity, [
        'title' => 'Alunos cadastrados por mês',
        'animation' => [
        'startup' => true,
        'easing' => 'inAndOut'
        ],
        'colors' => ['orange', '#ff8c1a']
        ]);

        $lava->DonutChart('donutchart', $popularity, [
            'title' => 'Alunos cadastrados por mês'
        ]);

        //Usuários
        // $users = User::select(DB::raw("COUNT(*) as count , MONTHNAME(created_at) as month")) mysql
        $users = User::select(DB::raw("COUNT(*) as count , MONTH(created_at) as month"))
        ->orderBy("created_at")
        ->groupBy(DB::raw("month(created_at)"))
        ->get()->toArray();
        $chart_array_user = array();
        foreach($users as $data){
        $n_data = [];
        array_push($n_data,$data['month'],$data['count']);
        array_push($chart_array_user,$n_data);
        }
        $lava_user = new Lavacharts;
        $popularity_user = $lava_user->DataTable();
        $popularity_user->addStringColumn('Country')
        ->addNumberColumn('Usuários')
        ->addRows($chart_array_user);
        $lava_user->LineChart('demochartUser', $popularity_user, [
        'title' => 'Usuários cadastrados por mês',
        'animation' => [
        'startup' => true,
        'easing' => 'inAndOut'
        ],
        'colors' => ['orange', '#ff8c1a']
        ]);

        $lava_user->DonutChart('donutchartUser', $popularity_user, [
            'title' => 'Usuários cadastrados por mês'
        ]);

        return view('admin.home.index', compact('total_alunos','total_professores','total_users','total_turmas','lava','lava_user'));
    }
}
