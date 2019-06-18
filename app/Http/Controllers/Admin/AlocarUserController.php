<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\AlocarUser;
use App\Models\Turma;
use App\Models\Disciplina;
use App\User;

class AlocarUserController extends Controller
{
    public function index()
    {
        $alocar_users = AlocarUser::all();
        $total = AlocarUser::all()->count();
        $turmas = Turma::all();
        $disciplinas = Disciplina::all();
        $users = User::all();
        return view('admin.alocarUser.index',compact('alocar_users','total','turmas','disciplinas','users'));
    }

    public function create()
    {
        $turmas = Turma::all();
        $disciplinas = Disciplina::all();
        $users = User::all();
        return view('admin.alocarUser.create', compact('turmas','disciplinas','users'));
    }

    public function createPost(Request $request)
    {   

        try {
            
            DB::beginTransaction();
            $alocar_user = new AlocarUser();

            $alocar_user->turma_id = $request->turma_id;
            $alocar_user->disciplina_id = $request->disciplina_id;
            $alocar_user->user_id = $request->user_id;
            $alocar_user->save();

            DB::commit();
            return redirect()
                    ->route('admin.alocarUser')
                    ->with('message', 'Cadastro de professor em turma realizado com sucesso.');

        }catch(\Exception $e) {   
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
      

    }

    public function edit($id) {
        $turmas = Turma::all();
        $disciplinas = Disciplina::all();
        $users = User::all();
        $alocar_user = AlocarUser::findOrFail($id);
        return view('admin.alocarUser.edit', compact('alocar_user','id','turmas','disciplinas','users'));
    }

    public function editPost(Request $request, $id) {

        try {
            DB::beginTransaction();
            $alocar_user = new AlocarUser();

            $alocar_user->turma_id = $request->turma_id;
            $alocar_user->disciplina_id = $request->disciplina_id;
            $alocar_user->user_id = $request->user_id;
            $alocar_user->save();

            DB::commit();
            return redirect()->route('admin.alocarUser')->with('message', 'Alteração de professor em turma realizado com sucesso!');

        } catch(\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
        
    }

    public function destroy($id) {
        try {
            $alocar_user = AlocarUser::findOrFail($id);
            $alocar_user->delete();
            return redirect()->route('admin.alocarUser')->with('message', 'Professor foi desvinculado da turma com sucesso!');

        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
    }
}
