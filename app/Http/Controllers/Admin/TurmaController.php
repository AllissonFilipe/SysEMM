<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Turma;
use App\Http\Requests\TurmaValidationFormRequest;

class TurmaController extends Controller
{
    public function index()
    {
        $turmas = Turma::all();
        $total = Turma::all()->count();
        return view('admin.turma.index', compact('turmas','total'));
    }


    public function create()
    {
        return view('admin.turma.create');
    }

    public function createPost(TurmaValidationFormRequest $request)
    {   

        $turma = new Turma();
        $turma->nome = $request->nome;
        $turma->turno = $request->turno;
        $turma->qtd_vagas = $request->qtd_vagas;
        $turma->ano_letivo = $request->ano_letivo;
        $turma->save();
      
        return redirect()
                    ->route('admin.turma')
                    ->with('message', 'Turma cadastrada com sucesso.');

    }

    public function edit($id) {
        $turma = Turma::findOrFail($id);
        return view('admin.turma.edit', compact('turma','id'));
    }

    public function editPost(TurmaValidationFormRequest $request, $id) {
        $turma = Turma::findOrFail($id); 
        $turma->nome = $request->nome;
        $turma->turno = $request->turno;
        $turma->qtd_vagas = $request->qtd_vagas;
        $turma->ano_letivo = $request->ano_letivo;
        $turma->save();
        return redirect()->route('admin.turma')->with('message', 'Turma alterada com sucesso!');
    }

    public function destroy($id) {
        $turma = Turma::findOrFail($id);
        $turma->delete();
        return redirect()->route('admin.turma')->with('message', 'Turma excluída com sucesso!');
    }
}
