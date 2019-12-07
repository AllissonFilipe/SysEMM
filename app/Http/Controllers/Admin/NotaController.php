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
        $notas = Nota::all();
        $turma_alunos = TurmaAluno::all();
        $disciplinas = Disciplina::all();
        $alunos = Aluno::all();
        $turmas = Turma::all();
        return view('admin.nota.index', compact('notas','turma_alunos','disciplinas','alunos','turmas'));
    }

    public function create(Request $request)
    {
        
        $turma_id = $request->turma_id;
        $disciplina_id = $request->disciplina_id;
        $unidade = $request->unidade;
        $tipo = $request->tipo;
        $turmas = Turma::all();
        $turma_alunos = TurmaAluno::where('turma_id',$turma_id)->get();
        $turma_alunos_count = TurmaAluno::where('turma_id',$turma_id)->count();
        for($i = 0; $i < $turma_alunos_count; $i++) {
            $qtdNota = Nota::where('turma_aluno_id',$turma_alunos[$i]->id)->where('disciplina_id',$disciplina_id)->where('unidade',$unidade)->where('tipo',$tipo)->count();
            if($qtdNota > 0) {
                unset($turma_alunos[$i]);
            }
        }
        if(count($turma_alunos) == 0) {
            return redirect()->back()->with('error', 'Não existem alunos para cadastrar notas');
        }
        $disciplinas = Disciplina::all();
        $alunos = Aluno::all();
        return view('admin.nota.create', compact('disciplina_id','unidade','tipo','turmas','turma_alunos','disciplinas','alunos','turma_id'));
    }

    public function editList(Request $request) {
        $notas = Nota::where('turma_aluno_id',$request->turma_aluno_id)->where('disciplina_id',$request->disciplina_id)->get();
        $total = Nota::where('turma_aluno_id',$request->turma_aluno_id)->where('disciplina_id',$request->disciplina_id)->count();
        $disciplinas = Disciplina::all();
        $turma_aluno_id = $request->turma_aluno_id;
        $disciplina_id = $request->disciplina_id;
        if(count($notas) == 0) {
            return redirect()->back()->with('error', 'Não existem notas cadastradas !');
        }
        return view('admin.nota.list', compact('notas','disciplinas','turma_aluno_id','disciplina_id','total'));
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
            $nota->turma_id = TurmaAluno::select('turma_id')->where('id', $nota->turma_aluno_id)->value('turma_id');


            $qtdNota = Nota::where('turma_aluno_id',$request->turma_aluno_id)->where('disciplina_id',$request->disciplina_id)->where('unidade',$request->unidade)->where('tipo',$request->tipo)->count();
            if($qtdNota > 0) {
                return redirect()->back()->with('error', 'Nota Já existe !');
            }

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

    public function createPostTurma(Request $request)
    {   
        try {
            DB::beginTransaction();

            $dataForm = $request->all();


            for($i = 0; $i<count($dataForm['turma_aluno_id']); $i++)
            { 
                $nota = new Nota();

                $array[] = array (
                    $nota->turma_aluno_id = $dataForm['turma_aluno_id'][$i],
                    $nota->disciplina_id = $dataForm['disciplina_id'][$i],
                    $nota->unidade = $dataForm['unidade'][$i],
                    $nota->tipo = $dataForm['tipo'][$i],
                    $nota->nota = $dataForm['nota'][$i],
                    $nota->turma_id = $dataForm['turma_id'][$i],

                    $nota->save()
                );

            }


            if (count($array) > 0) 
            { 
                DB::commit(); 
                return redirect()
                            ->route('admin.nota')
                            ->with('message', 'Notas cadastradas com sucesso.');
            }

        } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
    }

    public function edit(Request $request) {
        $turma_id = $request->turma_id;
        $disciplina_id = $request->disciplina_id;
        $unidade = $request->unidade;
        $tipo = $request->tipo;
        $turmas = Turma::all();
        $disciplinas = Disciplina::all();
        $alunos = Aluno::all();
        $turma_alunos = TurmaAluno::where('turma_id',$turma_id)->get();
        $turma_alunos_count = TurmaAluno::where('turma_id',$turma_id)->count();
        $array_turma_aluno_id = array();
        for($i = 0; $i < $turma_alunos_count; $i++) {
            array_push($array_turma_aluno_id, $turma_alunos[$i]->id);
        }

        $notas = Nota::whereIn('turma_aluno_id', $array_turma_aluno_id)->where('disciplina_id',$disciplina_id)->where('unidade',$unidade)->where('tipo',$tipo)->get();
        if(count($notas) == 0) {
            return redirect()->back()->with('error', 'Não existem notas cadastradas !');
        }
        return view('admin.nota.edit', compact('turma_id','disciplina_id','unidade','tipo','turmas','notas','alunos','disciplinas','turma_alunos'));
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
            $nota->turma_id = $request->turma_id;
            $nota->save();

            DB::commit();
            return redirect()->back()->with('message', 'Nota alterada com sucesso!');
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
    }

    public function editPostTurma(Request $request) {
        try {
            DB::beginTransaction();
            $dataForm = $request->all();

            for($i = 0; $i<count($dataForm['turma_aluno_id']); $i++)
            { 
                $nota = Nota::findOrFail($dataForm['nota_id'][$i]);

                $array[] = array (
                    $nota->turma_aluno_id = $dataForm['turma_aluno_id'][$i],
                    $nota->disciplina_id = $dataForm['disciplina_id'][$i],
                    $nota->unidade = $dataForm['unidade'][$i],
                    $nota->tipo = $dataForm['tipo'][$i],
                    $nota->nota = $dataForm['nota'][$i],
                    $nota->turma_id = $dataForm['turma_id'][$i],

                    $nota->save()
                );

            }
            if (count($array) > 0) 
            { 
                DB::commit(); 
                return redirect()
                            ->route('admin.nota')
                            ->with('message', 'Notas alteradas com sucesso.');
            }

        } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
    }

    public function destroy($id) {
        try {
            $nota = Nota::findOrFail($id);
            $nota->delete();
            return redirect()->back()->with('message', 'Nota excluída com sucesso!');;
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
    }

    public function destroyTurma(Request $request) {
        try {

            $dataForm = $request->all();

            for($i = 0; $i<count($dataForm['turma_aluno_id']); $i++)
            { 
                $nota = Nota::findOrFail($dataForm['nota_id'][$i]);
                $nota->delete();
            }
            return redirect()->route('admin.nota')->with('message', 'Notas excluídas com sucesso!');

        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
        
    }
}
