<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TurmaAluno;
use App\Models\Aluno;
use App\Models\Turma;
use App\Http\Requests\TurmaAlunoValidationFormRequest;

class TurmaAlunoController extends Controller
{
    public function index()
    {
        $turma_alunos = TurmaAluno::all();
        $alunos = Aluno::all();
        $turmas = Turma::all();
        $total = TurmaAluno::all()->count();
        return view('admin.turmaAluno.index', compact('turma_alunos','total','alunos','turmas'));
    }


    public function create()
    {
        $alunos = Aluno::all();
        $turmas = Turma::all();
        return view('admin.turmaAluno.create', compact('alunos','turmas'));
    }

    public function createPost(TurmaAlunoValidationFormRequest $request)
    {   

        $turma_aluno = new TurmaAluno();
        $turma_aluno->dt_matricula = $request->dt_matricula;
        $turma_aluno->dt_cancelamento = $request->dt_cancelamento;
        $turma_aluno->aluno_id = $request->aluno_id;
        $turma_aluno->turma_id = $request->turma_id;
        $turma_aluno->save();
      
        return redirect()
                    ->route('admin.turmaAluno')
                    ->with('message', 'Aluno matriculado com sucesso.');

    }

    public function edit($id) {
        $alunos = Aluno::all();
        $turmas = Turma::all();
        $turma_aluno = TurmaAluno::findOrFail($id);
        return view('admin.turmaAluno.edit', compact('turma_aluno','id','alunos','turmas'));
    }

    public function editPost(TurmaAlunoValidationFormRequest $request, $id) {
        $turma_aluno = TurmaAluno::findOrFail($id); 
        $turma_aluno->dt_matricula = $request->dt_matricula;
        $turma_aluno->dt_cancelamento = $request->dt_cancelamento;
        $turma_aluno->aluno_id = $request->aluno_id;
        $turma_aluno->turma_id = $request->turma_id;
        $turma_aluno->save();
        return redirect()->route('admin.turmaAluno')->with('message', 'Matrícula do aluno alterada com sucesso!');
    }

    public function destroy($id) {
        $turma_aluno = TurmaAluno::findOrFail($id);
        $turma_aluno->delete();
        return redirect()->route('admin.turmaAluno')->with('message', 'Matrícula do aluno excluída com sucesso!');
    }
}
