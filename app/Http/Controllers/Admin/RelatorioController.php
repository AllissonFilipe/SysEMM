<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Turma;
use App\Models\Disciplina;
use App\Models\Nota;
use App\Models\Frequencia;
use App\Models\Aluno;
use App\Models\TurmaAluno;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class RelatorioController extends Controller
{
    public function index()
    {
        $turmas = Turma::all();
        $disciplinas = Disciplina::All();
        return view('admin.relatorio.index', compact('turmas','disciplinas'));
    }

    public function search(Request $request) {

        $turmas = Turma::all();
        $disciplinas = Disciplina::All();
        
        $turma_aluno_id = $request->turma_aluno_id;
        $turma_id = $request->turma_id;
        $disciplina_id = $request->disciplina_id;

        if(!isset($disciplina_id)) {
            return redirect()->back()->with('error', 'Campo disciplina não preenchido !');
        }

        if(isset($turma_aluno_id)) {

            $exist = TurmaAluno::where('id',$turma_aluno_id)->count();
            if($exist == 0) {
                return redirect()->back()->with('error', 'Matrícula não existe !');
            }

            $notas = array();
            $query_notas = Nota::selectRaw('AVG(nota) as media')->where('turma_aluno_id', $turma_aluno_id)->where('disciplina_id',$disciplina_id)->groupBy('unidade')->get();
            for($i = 0; $i < sizeof($query_notas); $i++) {
                array_push($notas, $query_notas[$i]->media);
            }

            $frequencias = array();
            $query_frequencias = Frequencia::selectRaw('COUNT(ausencia) as quantidade')->where('turma_aluno_id', $turma_aluno_id)->where('disciplina_id',$disciplina_id)->groupBy('ausencia')->get();
            for($i = 0; $i < sizeof($query_frequencias); $i++) {
                array_push($frequencias, $query_frequencias[$i]->quantidade);
            }
            $turma_aluno = TurmaAluno::where('id',$turma_aluno_id)->get();
            $aluno = Aluno::where('id',$turma_aluno[0]->aluno_id)->get();
            $disciplina_nome = Disciplina::where('id', $disciplina_id)->get();
            return view('admin.relatorio.index', compact('notas','aluno','frequencias','disciplina_nome','disciplinas','turmas'));

        } else if(isset($turma_id)) {
            
            $exist = Turma::where('id',$turma_id)->count();
            if($exist == 0) {
                return redirect()->back()->with('error', 'Turma não existe !');
            }

            $notas = array();
            $query_notas = Nota::selectRaw('AVG(nota) as media')->where('turma_id', $turma_id)->where('disciplina_id',$disciplina_id)->groupBy('unidade')->get();
            for($i = 0; $i < sizeof($query_notas); $i++) {
                array_push($notas, $query_notas[$i]->media);
            }

            $frequencias = array();
            $query_frequencias = Frequencia::selectRaw('COUNT(ausencia) as quantidade')->where('turma_id', $turma_id)->where('disciplina_id',$disciplina_id)->groupBy('ausencia')->get();
            for($i = 0; $i < sizeof($query_frequencias); $i++) {
                array_push($frequencias, $query_frequencias[$i]->quantidade);
            }
            $turma_nome = Turma::where('id',$turma_id)->get();
            $disciplina_nome = Disciplina::where('id', $disciplina_id)->get();
            return view('admin.relatorio.index', compact('notas','turma_nome','frequencias','disciplina_nome','disciplinas','turmas'));
        
        }else {
            return redirect()->back()->with('error', 'Campos não preenchidos !');
        }
        
    }
}
