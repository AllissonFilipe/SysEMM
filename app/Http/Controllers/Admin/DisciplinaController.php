<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Disciplina;
use App\Http\Requests\DisciplinaValidationFormRequest;
use Illuminate\Support\Facades\Input;

class DisciplinaController extends Controller
{
    public function index()
    {
        $disciplinas = Disciplina::all();
        $total = Disciplina::all()->count();
        return view('admin.disciplina.index', compact('disciplinas','total'));
    }

    public function search() {
        
        $q = Input::get ( 'q' );
        $disciplinas = Disciplina::where('nome','LIKE','%'.$q.'%')->get();
        $total = count($disciplinas);
        if(count($disciplinas) > 0)
            return view('admin.disciplina.index', compact('disciplinas','total'));
        else 
            return redirect()->back();
        
    }

    public function create()
    {
        return view('admin.disciplina.create');
    }

    public function createPost(DisciplinaValidationFormRequest $request)
    {   
        
        try {
            DB::beginTransaction();
            $disciplina = new Disciplina();
            $disciplina->nome = $request->nome;
            $disciplina->descricao = $request->descricao;
            $disciplina->save();
            
            DB::commit();
            return redirect()
                        ->route('admin.disciplina')
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
