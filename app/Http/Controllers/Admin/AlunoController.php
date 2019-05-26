<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Aluno;


class AlunoController extends Controller
{	
	public function index()
    {
        $alunos = Aluno::all();
        $total = Aluno::all()->count();
        return view('admin.aluno.index',compact('alunos','total'));
    }

    public function create()
    {
        return view('admin.aluno.create');
    }

    public function createPost(Request $request)
    {   

        $aluno = new Aluno();

        $aluno->nome = $request->nome;
        $aluno->data_de_nascimento = $request->data_de_nascimento;
        $aluno->sexo = $request->sexo;
        $aluno->rg = $request->rg;
        $aluno->cpf = $request->cpf;
        $aluno->senha = $request->senha;
        $aluno->save();
      
        return redirect()
                    ->route('admin.aluno')
                    ->with('message', 'Aluno cadastrado com sucesso.');

    }

    public function edit($id) {
        $aluno = Aluno::findOrFail($id);
        return view('admin.aluno.edit', compact('aluno','id'));
    }

    public function editPost(Request $request, $id) {
        $aluno = Aluno::findOrFail($id); 
        $aluno->nome = $request->nome;
        $aluno->data_de_nascimento = $request->data_de_nascimento;
        $aluno->sexo = $request->sexo;
        $aluno->rg = $request->rg;
        $aluno->cpf = $request->cpf;
        $aluno->senha = $request->senha;
        $aluno->save();
        return redirect()->route('admin.aluno')->with('message', 'Aluno alterado com sucesso!');
    }

    public function destroy($id) {
        $aluno = Aluno::findOrFail($id);
        $aluno->delete();
        return redirect()->route('admin.aluno')->with('message', 'Aluno excluído com sucesso!');
    }
}
