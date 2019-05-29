<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
// use App\Controllers\Admin\User;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileFormRequest;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        $total = User::all()->count();
        return view('admin.user.index', compact('users','total'));
    }


    public function create()
    {
        return view('admin.user.create');
    }

    public function createPost(Request $request)
    {   

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->tipo = $request->tipo;
        $user->cpf = $request->cpf;
        $user->data_de_nascimento = $request->data_de_nascimento;
        $user->telefone = $request->telefone;
        $user->cep = $request->cep;
        $user->numero = $request->numero;
        $user->logradouro = $request->logradouro;
        $user->complemento = $request->complemento;
        $user->bairro = $request->bairro;
        $user->cidade = $request->cidade;
        $user->uf = $request->uf;

        $user->save();
      
        return redirect()
                    ->route('admin.user')
                    ->with('message', 'Usuário cadastrado com sucesso.');

    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user','id'));
    }

    public function editPost(Request $request, $id) {
        $user = User::findOrFail($id); 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->tipo = $request->tipo;
        $user->cpf = $request->cpf;
        $user->data_de_nascimento = $request->data_de_nascimento;
        $user->telefone = $request->telefone;
        $user->cep = $request->cep;
        $user->numero = $request->numero;
        $user->logradouro = $request->logradouro;
        $user->complemento = $request->complemento;
        $user->bairro = $request->bairro;
        $user->cidade = $request->cidade;
        $user->uf = $request->uf;
        $user->save();
        return redirect()->route('admin.user')->with('message', 'Usuário alterado com sucesso!');
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user')->with('message', 'Usuário     excluído com sucesso!');
    }
    
    public function profile()
    {
        return view('site.profile.profile');
    }


    public function profileUpdate(UpdateProfileFormRequest $request)
    {
        $user = auth()->user();

        $data = $request->all();

        if ($data['password'] != null)
            $data['password'] = bcrypt($data['password']);
        else
            unset($data['password']);


        $update = $user->update($data);

        if ($update)
            return redirect()
                        ->route('profile')
                        ->with('success', 'Sucesso ao atualizar!');

        return redirect()
                    ->back()
                    ->with('error', 'Falha ao atualizar o perfil...');
    }
}
