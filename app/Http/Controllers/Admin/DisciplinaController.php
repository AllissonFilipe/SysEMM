<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Disciplina;

class DisciplinaController extends Controller
{
    public function index()
    {
        $disciplinas = Disciplina::all();
        $total = Disciplina::all()->count();
        return view('admin.disciplina.index', compact('disciplinas','total'));
    }

    public function create()
    {
        return view('admin.disciplina.create');
    }

    public function createPost(Request $request)
    {   

        $disciplina = new Disciplina();
        $disciplina->nome = $request->nome;
        $disciplina->descricao = $request->descricao;
        $disciplina->save();
      
        return redirect()
                    ->route('admin.disciplina')
                    ->with('message', 'Disciplina cadastrada com sucesso.');

    }

    public function edit($id) {
        $disciplina = Disciplina::findOrFail($id);
        return view('admin.disciplina.edit', compact('disciplina','id'));
    }

    public function editPost(Request $request, $id) {
        $disciplina = Disciplina::findOrFail($id); 
        $disciplina->nome = $request->nome;
        $disciplina->descricao = $request->descricao;
        $disciplina->save();
        return redirect()->route('admin.disciplina')->with('message', 'Disciplina alterada com sucesso!');
    }

    public function destroy($id) {
        $disciplina = Disciplina::findOrFail($id);
        $disciplina->delete();
        return redirect()->route('admin.disciplina')->with('message', 'Disciplina excluída com sucesso!');
    }
}
