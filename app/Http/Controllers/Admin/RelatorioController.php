<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Turma;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class RelatorioController extends Controller
{
    public function index()
    {
        $turmas = Turma::all();
        // $alunos = Disciplina::all()->count();
        return view('admin.relatorio.index', compact('turmas'));
    }

    public function search(Request $request) {
        
        // $turma_id = $request->turma_id;
        // $disciplinas = Disciplina::where('nome','LIKE','%'.$q.'%')->paginate(10);
        // $total = count($disciplinas);
        // if(count($disciplinas) > 0)
        //     return view('admin.relatorio.index', compact('disciplinas','total'));
        // else 
        //     return redirect()->back();
        
    }
}
