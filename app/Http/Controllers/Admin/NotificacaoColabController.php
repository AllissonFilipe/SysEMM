<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\NotificacaoColab;
use App\User;
use App\Models\Aluno;
use App\Models\Turma;
use App\Http\Requests\NotificacaoColabValidationFormRequest;


class NotificacaoColabController extends Controller
{
	public function index()
    {
        $notificacao_colabs = NotificacaoColab::all();
        $total = NotificacaoColab::all()->count();
        return view('admin.notificacaoColab.index', compact('notificacao_colabs','total'));
    }

    public function create()
    {
        $users = User::all();
        $alunos = Aluno::all();
        $turmas = Turma::all();
        return view('admin.notificacaoColab.create', compact('users','alunos','turmas'));
    }

    public function createPost(NotificacaoColabValidationFormRequest $request)
    {   
        try {
            DB::beginTransaction();
            $notificacao_colab = new NotificacaoColab();
            $notificacao_colab->titulo = $request->titulo;
            $notificacao_colab->descricao = $request->descricao;
            $notificacao_colab->tipo = $request->tipo;
            $notificacao_colab->categoria = $request->categoria;
            $notificacao_colab->user_id = $request->user_id;
            $notificacao_colab->aluno_id = $request->aluno_id;
            $notificacao_colab->turma_id = $request->turma_id;
            $notificacao_colab->save();

            DB::commit();
            return redirect()
                    ->route('admin.notificacaoColab')
                    ->with('message', 'Notificação cadastrada com sucesso.');
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
    }

    public function edit($id) {
        $users = User::all();
        $alunos = Aluno::all();
        $turmas = Turma::all();
        $notificacao_colab = NotificacaoColab::findOrFail($id);

        return view('admin.notificacaoColab.edit', compact('notificacao_colab','id','users','alunos','turmas'));
    }

    public function editPost(NotificacaoColabValidationFormRequest $request, $id) {

        try {
            DB::beginTransaction();
            $notificacao_colab = NotificacaoColab::findOrFail($id); 
            $notificacao_colab->titulo = $request->titulo;
            $notificacao_colab->descricao = $request->descricao;
            $notificacao_colab->tipo = $request->tipo;
            $notificacao_colab->categoria = $request->categoria;
            $notificacao_colab->user_id = $request->user_id;
            $notificacao_colab->aluno_id = $request->aluno_id;
            $notificacao_colab->turma_id = $request->turma_id;
            $notificacao_colab->save();

            DB::commit();
            return redirect()->route('admin.notificacaoColab')->with('message', 'Notificação alterada com sucesso!');
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
    }

    public function destroy($id) {
        try {
            $notificacao_colab = NotificacaoColab::findOrFail($id);
            $notificacao_colab->delete();
            return redirect()->route('admin.notificacaoColab')->with('message', 'Notificação excluída com sucesso!');
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
    }
}
