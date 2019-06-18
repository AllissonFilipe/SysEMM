<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        try {
            DB::beginTransaction();
            $turma = new Turma();
            $turma->nome = $request->nome;
            $turma->turno = $request->turno;
            $turma->qtd_vagas = $request->qtd_vagas;
            $turma->ano_letivo = $request->ano_letivo;
            $turma->save();

            DB::commit();
            return redirect()
                    ->route('admin.turma')
                    ->with('message', 'Turma cadastrada com sucesso.');

        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
    }

    public function edit($id) {
        $turma = Turma::findOrFail($id);
        return view('admin.turma.edit', compact('turma','id'));
    }

    public function editPost(TurmaValidationFormRequest $request, $id) {

        try {
            DB::beginTransaction();
            $turma = Turma::findOrFail($id); 
            $turma->nome = $request->nome;
            $turma->turno = $request->turno;
            $turma->qtd_vagas = $request->qtd_vagas;
            $turma->ano_letivo = $request->ano_letivo;
            $turma->save();

            DB::commit();
            return redirect()->route('admin.turma')->with('message', 'Turma alterada com sucesso!');

        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
    }

    public function destroy($id) {
        try {
            $turma = Turma::findOrFail($id);
            $turma->delete();
            return redirect()->route('admin.turma')->with('message', 'Turma excluída com sucesso!');
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
    }
}
