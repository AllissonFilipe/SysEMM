<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Aluno;
use App\Http\Requests\AlunoValidationFormRequest;
use App\Models\Responsavel;
use Illuminate\Support\Facades\Input;


class AlunoController extends Controller
{	
	public function index()
    {
        $alunos = Aluno::paginate(10);
        $total = Aluno::all()->count();
        return view('admin.aluno.index',compact('alunos','total'));
    }

    public function search() {
        
        $q = Input::get ( 'q' );
        $alunos = Aluno::where('nome','LIKE','%'.$q.'%')->orWhere('rg','LIKE','%'.$q.'%')->orWhere('cpf','LIKE','%'.$q.'%')->paginate(10);
        $total = count($alunos);
        if(count($alunos) > 0)
            return view('admin.aluno.index', compact('alunos','total'));
        else 
            return redirect()->back();
        
    }

    public function create()
    {
        $responsaveis = Responsavel::all();
        return view('admin.aluno.create', compact('responsaveis'));
    }

    public function createPost(AlunoValidationFormRequest $request)
    {   

        try {
            
            DB::beginTransaction();
            $aluno = new Aluno();

            $aluno->nome = $request->nome;
            $aluno->data_de_nascimento = $request->data_de_nascimento;
            $aluno->sexo = $request->sexo;
            $aluno->rg = $request->rg;
            $aluno->cpf = $request->cpf;
            $aluno->senha = bcrypt($request->senha);
            $aluno->save();

            if(is_array($request->responsavel)) {
                foreach ($request->responsavel as $r) {
                    $responsavel = Responsavel::find($r);
                    $aluno->responsavels()->attach($responsavel);
                }
            }

            DB::commit();
            return redirect()
                    ->route('admin.aluno')
                    ->with('message', 'Aluno cadastrado com sucesso.');

        }catch(\Exception $e) {   
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
      

    }

    public function edit($id) {
        $responsaveis = Responsavel::all();
        $aluno = Aluno::findOrFail($id);
        return view('admin.aluno.edit', compact('aluno','id','responsaveis'));
    }

    public function editPost(AlunoValidationFormRequest $request, $id) {

        try {
            DB::beginTransaction();
            $aluno = Aluno::findOrFail($id); 
            $aluno->nome = $request->nome;
            $aluno->data_de_nascimento = $request->data_de_nascimento;
            $aluno->sexo = $request->sexo;
            $aluno->rg = $request->rg;
            $aluno->cpf = $request->cpf;
            $aluno->senha = bcrypt($request->senha);
            $aluno->ativo = $request->ativo;
            $aluno->save();
            $aluno->responsavels()->detach();

            if(is_array($request->responsavel)) {
                foreach ($request->responsavel as $r) {
                    $responsavel = Responsavel::find($r);
                    $aluno->responsavels()->attach($responsavel);
                }
            }

            DB::commit();
            return redirect()->route('admin.aluno')->with('message', 'Aluno alterado com sucesso!');

        } catch(\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
        
    }

    public function destroy($id) {
        try {
            $aluno = Aluno::findOrFail($id);
            $aluno->delete();
            return redirect()->route('admin.aluno')->with('message', 'Aluno excluído com sucesso!');

        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
    }
}