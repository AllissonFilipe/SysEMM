<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Nota;
use App\Models\TurmaAluno;
use App\Models\Disciplina;
use App\Models\Aluno;
use App\Models\Turma;
use App\Http\Requests\NotaValidationFormRequest;


class NotaController extends Controller
{

    
    public function index(Request $request)
    {
        $turma_aluno_id = $request->turma_aluno_id;
        if(!$turma_aluno_id) {
            $turma_aluno_id = 0;
        }
        $notas = Nota::all();
        $turma_alunos = TurmaAluno::all();
        $disciplinas = Disciplina::all();
        $alunos = Aluno::all();
        $turmas = Turma::all();
        return view('admin.nota.index', compact('notas','turma_alunos','disciplinas','alunos','turmas','turma_aluno_id'));
    }

    public function create()
    {
        $turma_alunos = TurmaAluno::all();
        $disciplinas = Disciplina::all();
        $alunos = Aluno::all();
        return view('admin.nota.create', compact('turma_alunos','disciplinas','alunos'));
    }

    public function createPost(NotaValidationFormRequest $request)
    {   
        try {
            DB::beginTransaction();
            $nota = new Nota();
            $nota->nota = $request->nota;
            $nota->tipo = $request->tipo;
            $nota->unidade = $request->unidade;
            $nota->disciplina_id = $request->disciplina_id;
            $nota->turma_aluno_id = $request->turma_aluno_id;
            $nota->save();

            DB::commit();
            return redirect()
                    ->route('admin.nota')
                    ->with('message', 'Nota cadastrada com sucesso.');
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
    }

    public function edit($id) {
        $turma_alunos = TurmaAluno::all();
        $disciplinas = Disciplina::all();
        $alunos = Aluno::all();
        $nota = Nota::findOrFail($id);
        return view('admin.nota.edit', compact('nota','id','turma_alunos','disciplinas','alunos'));
    }

    public function editPost(NotaValidationFormRequest $request, $id) {

        try {
            DB::beginTransaction();
            $nota = Nota::findOrFail($id); 
            $nota->nota = $request->nota;
            $nota->tipo = $request->tipo;
            $nota->unidade = $request->unidade;
            $nota->disciplina_id = $request->disciplina_id;
            $nota->turma_aluno_id = $request->turma_aluno_id;
            $nota->save();

            DB::commit();
            return redirect()->route('admin.nota')->with('message', 'Nota alterada com sucesso!');
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
    }

    public function destroy($id) {
        try {
            $nota = Nota::findOrFail($id);
            $nota->delete();
            return redirect()->route('admin.nota')->with('message', 'Nota excluída com sucesso!');
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
    }
}
