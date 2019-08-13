<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Turma;
use App\Models\Disciplina;
use App\Models\TurmaAluno;
use App\Models\Aluno;
use App\Models\Frequencia;


class FrequenciaController extends Controller
{
    public function index()
    {
        $turmas = Turma::all();
        $disciplinas = Disciplina::all();
        return view('admin.frequencia.index', compact('turmas','disciplinas'));
    }

    public function indexPost(Request $request)
    {

        $turma = $request->turma_id;
        $turma_alunos = TurmaAluno::where('turma_id',$turma)->get();
        $disciplina = $request->disciplina_id;
        $data = $request->data_frequencia;
        $alunos = Aluno::all();
        return view('admin.frequencia.create', compact('disciplina','data','turma_alunos','alunos'));
    }

    public function create(Resquest $request)
    {
        $turma = $request->turma_id;
        $turma_alunos = TurmaAluno::where('turma_id',$turma);
        $disciplina = $request->disciplina_id;
        $data = $request->disciplina_id;
        $alunos = Aluno::all();
        return view('admin.frequencia.create', compact('disciplina','data','turma_alunos','alunos'));
    }

    public function createPost(Request $request)
    {   
        try {
            DB::beginTransaction();
            $dataForm = $request->all();
            for($i = 0; $i<count($dataForm['turma_aluno_id']); $i++)
            {   
                // $arrayForm[] = array(
                // 'disciplina_id' => $dataForm['disciplina_id'][$i],
                // 'data_frequencia' => $dataForm['data_frequencia'][$i],
                // 'turma_aluno_id' => $dataForm['turma_aluno_id'][$i], 
                // 'presenca' => $dataForm['presenca'][$i]
                // );
                $frequencia = new Frequencia();

                // if($dataForm['presenca'][$i] == true) {
                //     $dataForm['presenca'][$i] = 1;
                // } else {
                //     $dataForm['presenca'][$i] = 0;
                // }

                $array[] = array (
                    $frequencia->disciplina_id = $dataForm['disciplina_id'][$i],
                    $frequencia->data_frequencia = $dataForm['data_frequencia'][$i],
                    $frequencia->turma_aluno_id = $dataForm['turma_aluno_id'][$i],
                    $frequencia->presenca = isset($dataForm['presenca'][$i])? 1: 0,

                    $frequencia->save()
                );
                

            }
            if (count($array) > 0) 
            { 
                DB::commit(); 
                return redirect()
                            ->route('admin.frequencia')
                            ->with('message', 'Frequencia cadastrada com sucesso.');
            }

        } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
        

    }

    public function edit($id) {
        $disciplina = Disciplina::findOrFail($id);
        return view('admin.disciplina.edit', compact('disciplina','id'));
    }

    public function editPost(DisciplinaValidationFormRequest $request, $id) {

        try {
            DB::beginTransaction();
            $disciplina = Disciplina::findOrFail($id); 
            $disciplina->nome = $request->nome;
            $disciplina->descricao = $request->descricao;
            $disciplina->save();
           
            DB::commit();
            return redirect()->route('admin.disciplina')->with('message', 'Disciplina alterada com sucesso!');
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
    }

    public function destroy($id) {
        try {
            $disciplina = Disciplina::findOrFail($id);
            $disciplina->delete();
            return redirect()->route('admin.disciplina')->with('message', 'Disciplina excluída com sucesso!');
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
        
    }
}
