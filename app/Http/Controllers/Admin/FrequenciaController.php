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
        $disciplina = $request->disciplina_id;
        $data = $request->data_frequencia;

        $frequencias_count = Frequencia::where('turma_id',$turma)->where('disciplina_id',$disciplina)->where('data_frequencia',$data)->count();

        
        if($frequencias_count > 0) {
            return redirect()->back()->with('error','A frequência já existe');
        }

        $turma_alunos = TurmaAluno::where('turma_id',$turma)->get();
        $alunos = Aluno::all();
        return view('admin.frequencia.create', compact('disciplina','data','turma_alunos','alunos','turma'));
    }

    public function indexEditPost(Request $request) {

        $turma = $request->turma_id;
        $disciplina = $request->disciplina_id;
        $data = $request->data_frequencia;
        $frequencias_count = Frequencia::where('turma_id',$turma)->where('disciplina_id',$disciplina)->where('data_frequencia',$data)->count();

        if($frequencias_count == 0) {
            return redirect()->back()->with('error','A frequência solicitada não existe');
        }

        $frequencias = Frequencia::where('turma_id',$turma)->where('disciplina_id',$disciplina)->where('data_frequencia',$data)->get();

        $turma_alunos = TurmaAluno::where('turma_id',$turma)->get();
        $alunos = Aluno::all();
        return view('admin.frequencia.edit', compact('disciplina','data','turma_alunos','alunos','frequencias'));
    }

    public function indexDeletePost(Request $request) {

        $turma = $request->turma_id;
        $disciplina = $request->disciplina_id;
        $data = $request->data_frequencia;
        $frequencias_count = Frequencia::where('turma_id',$turma)->where('disciplina_id',$disciplina)->where('data_frequencia',$data)->count();

        if($frequencias_count == 0) {
            return redirect()->back()->with('error','A frequência solicitada não existe');
        }

        $frequencias = Frequencia::where('turma_id',$turma)->where('disciplina_id',$disciplina)->where('data_frequencia',$data)->get();

        $turma_alunos = TurmaAluno::where('turma_id',$turma)->get();
        $alunos = Aluno::all();
        return view('admin.frequencia.delete', compact('disciplina','data','turma_alunos','alunos','frequencias'));
    }

    public function createPost(Request $request)
    {   
        try {
            DB::beginTransaction();
            $dataForm = $request->all();
            // dd($dataForm);
            $frequencias = Frequencia::where('turma_id',$dataForm['turma_id'][0])->where('disciplina_id',$dataForm['disciplina_id'][0])->where('data_frequencia',$dataForm['data_frequencia'][0])->count();
            
            
            if($frequencias > 0) {
                return redirect()->back()->with('error','Esta frequência já foi cadastrada');
            }  

            for($i = 0; $i<count($dataForm['turma_aluno_id']); $i++)
            { 
                $frequencia = new Frequencia();

                if($dataForm['ausencia'][$i] == "on") {
                    $frequencia->ausencia = 1;
                }else {
                    $frequencia->ausencia = 0;
                }

                $array[] = array (
                    $frequencia->disciplina_id = $dataForm['disciplina_id'][$i],
                    $frequencia->data_frequencia = $dataForm['data_frequencia'][$i],
                    $frequencia->turma_aluno_id = $dataForm['turma_aluno_id'][$i],
                    $frequencia->turma_id = $dataForm['turma_id'][$i],
                    $frequencia->ausencia,

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

    public function editPost(Request $request) {
        try {
            DB::beginTransaction();
            $dataForm = $request->all();
            // dd($dataForm);

            for($i = 0; $i<count($dataForm['turma_aluno_id']); $i++)
            { 
                $frequencia = Frequencia::findOrFail($dataForm['frequencia_id'][$i]);

                if($dataForm['ausencia'][$i] == "on") {
                    $frequencia->ausencia = 1;
                }else {
                    $frequencia->ausencia = 0;
                }

                $array[] = array (
                    $frequencia->disciplina_id = $dataForm['disciplina_id'][$i],
                    $frequencia->data_frequencia = $dataForm['data_frequencia'][$i],
                    $frequencia->turma_aluno_id = $dataForm['turma_aluno_id'][$i],
                    $frequencia->turma_id = $dataForm['turma_id'][$i],
                    $frequencia->ausencia,

                    $frequencia->save()
                );

            }
            if (count($array) > 0) 
            { 
                DB::commit(); 
                return redirect()
                            ->route('admin.frequencia')
                            ->with('message', 'Frequencia alterada com sucesso.');
            }

        } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
    }

    public function destroy(Request $request) {
        try {

            $dataForm = $request->all();

            for($i = 0; $i<count($dataForm['turma_aluno_id']); $i++)
            { 
                $frequencia = Frequencia::findOrFail($dataForm['frequencia_id'][$i]);
                $frequencia->delete();
            }
            return redirect()->route('admin.frequencia')->with('message', 'Frequencias excluídas com sucesso!');

        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
        
    }
}
