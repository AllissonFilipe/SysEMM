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

    // public function create(Resquest $request)
    // {
    //     $turma = $request->turma_id;
    //     $turma_alunos = TurmaAluno::where('turma_id',$turma);
    //     $disciplina = $request->disciplina_id;
    //     $data = $request->disciplina_id;
    //     $alunos = Aluno::all();
    //     return view('admin.frequencia.create', compact('disciplina','data','turma_alunos','alunos'));
    // }

    public function createPost(Request $request)
    {   
        
        // try {
        //     DB::beginTransaction();
        //     $disciplina = new Disciplina();
        //     $disciplina->nome = $request->nome;
        //     $disciplina->descricao = $request->descricao;
        //     $disciplina->save();
            
        //     DB::commit();
        //     return redirect()
        //                 ->route('admin.disciplina')
        //                 ->with('message', 'Disciplina cadastrada com sucesso.');

        // }catch (\Exception $e) {
        //     DB::rollBack();
        //     return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        // }
        
        ////////////////////////////////////////////////////////////////

        try {
            $data=$request->all();
            $lastid=Frequencia::create($data)->id;
            if(count($request->presenca) > 0)
            {
            foreach($request->product_name as $item=>$v){
                DB::beginTransaction();
                $frequencia = new Frequencia();
                $frequencia->disciplina_id=$request->disciplina_id;
                $frequencia->data_frequencia=$request->data_frequencia;
                $frequencia->turma_aluno_id=$request->turma_aluno_id[$item];
                $frequencia->presenca=$request->presenca[$item];

                Frequencia::insert($frequencia);
                }
            }
            return redirect()
                        ->route('admin.frequencia')
                        ->with('message', 'Disciplina cadastrada com sucesso.');

        }catch (\Exception $e) {
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
