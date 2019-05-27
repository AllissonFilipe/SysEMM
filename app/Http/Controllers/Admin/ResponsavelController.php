<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Responsavel;


class ResponsavelController extends Controller
{

    public function index()
    {
        $responsavels = Responsavel::all();
        $total = Responsavel::all()->count();
        return view('admin.responsavel.index', compact('responsavels','total'));
    }

    public function create()
    {
        return view('admin.responsavel.create');
    }

    public function createPost(Request $request)
    {   

        $responsavel = new Responsavel();

        $responsavel->nome = $request->nome;
        $responsavel->cpf = $request->cpf;
        $responsavel->telefone = $request->telefone;
        $responsavel->grau_de_parentesco = $request->grau_de_parentesco;
        $responsavel->cep = $request->cep;
        $responsavel->numero = $request->numero;
        $responsavel->logradouro = $request->logradouro;
        $responsavel->complemento = $request->complemento;
        $responsavel->bairro = $request->bairro;
        $responsavel->cidade = $request->cidade;
        $responsavel->uf = $request->uf;

        $responsavel->save();
      
        return redirect()
                    ->route('admin.responsavel')
                    ->with('message', 'Responsavel cadastrado com sucesso.');

    }

    public function edit($id) {
        $responsavel = Responsavel::findOrFail($id);
        return view('admin.responsavel.edit', compact('responsavel','id'));
    }

    public function editPost(Request $request, $id) {
        $responsavel = Responsavel::findOrFail($id); 
        $responsavel->nome = $request->nome;
        $responsavel->cpf = $request->cpf;
        $responsavel->telefone = $request->telefone;
        $responsavel->grau_de_parentesco = $request->grau_de_parentesco;
        $responsavel->cep = $request->cep;
        $responsavel->numero = $request->numero;
        $responsavel->logradouro = $request->logradouro;
        $responsavel->complemento = $request->complemento;
        $responsavel->bairro = $request->bairro;
        $responsavel->cidade = $request->cidade;
        $responsavel->uf = $request->uf;
        $responsavel->save();
        return redirect()->route('admin.responsavel')->with('message', 'Responsavel alterado com sucesso!');
    }

    public function destroy($id) {
        $responsavel = Responsavel::findOrFail($id);
        $responsavel->delete();
        return redirect()->route('admin.responsavel')->with('message', 'Responsavel excluído com sucesso!');
    }
}
