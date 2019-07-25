<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Responsavel;
use App\Http\Requests\ResponsavelValidationFormRequest;
use Illuminate\Support\Facades\Input;

class ResponsavelController extends Controller
{

    public function index()
    {
        $responsavels = Responsavel::all();
        $total = Responsavel::all()->count();
        return view('admin.responsavel.index', compact('responsavels','total'));
    }

    public function search() {
        
        $q = Input::get ( 'q' );
        $responsavels = Responsavel::where('nome','LIKE','%'.$q.'%')->orWhere('cpf','LIKE','%'.$q.'%')->get();
        $total = count($responsavels);
        if(count($responsavels) > 0)
            return view('admin.responsavel.index', compact('responsavels','total'));
        else 
            return redirect()->back();
        
    }

    public function create()
    {
        return view('admin.responsavel.create');
    }

    public function createPost(ResponsavelValidationFormRequest $request)
    {   
        try {
            DB::beginTransaction();
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

            DB::commit();
            return redirect()
                    ->route('admin.responsavel')
                    ->with('message', 'Responsavel cadastrado com sucesso.');

        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
    }

    public function edit($id) {
        $responsavel = Responsavel::findOrFail($id);
        return view('admin.responsavel.edit', compact('responsavel','id'));
    }

    public function editPost(ResponsavelValidationFormRequest $request, $id) {

        try {
            DB::beginTransaction();
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
            $responsavel->ativo = $request->ativo;
            $responsavel->save();

            DB::commit();
            return redirect()->route('admin.responsavel')->with('message', 'Responsavel alterado com sucesso!');
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
    }

    public function destroy($id) {
        try {
            $responsavel = Responsavel::findOrFail($id);
            $responsavel->delete();
            return redirect()->route('admin.responsavel')->with('message', 'Responsavel excluído com sucesso!');
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
    }
}
