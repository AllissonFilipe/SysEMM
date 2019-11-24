<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Turma;
use App\Models\Disciplina;
use App\Models\Nota;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class RelatorioController extends Controller
{
    public function index()
    {
        $turmas = Turma::all();
        $disciplinas = Disciplina::All();
        // $alunos = Disciplina::all()->count();
        return view('admin.relatorio.index', compact('turmas','disciplinas'));
    }

    public function search(Request $request) {
        
        // $turma_aluno_id = $request->turma_aluno_id;
        // $turma_id = $request->turma_id;
        // $disciplina_id = $request->disciplina_id;

        // if($turma_aluno_id) {

        //     $notas = Nota::where("disciplina_id", $disciplina_id)->where()

        // } else if($turma_id) {

        // }


        // $turma_id = $request->turma_id;
        // $disciplinas = Disciplina::where('nome','LIKE','%'.$q.'%')->paginate(10);
        // $total = count($disciplinas);
        // if(count($disciplinas) > 0)
        //     return view('admin.relatorio.index', compact('disciplinas','total'));
        // else 
        //     return redirect()->back();
        
    }
}
