<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileFormRequest;
use App\Http\Requests\UserValidationFormRequest;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate(10);
        $total = User::all()->count();
        return view('admin.user.index', compact('users','total'));
    }

    public function search() {
        
        $q = Input::get ( 'q' );
        $users = User::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->paginate(10);
        $total = count($users);
        if(count($users) > 0)
            return view('admin.user.index', compact('users','total'));
        else 
            return redirect()->back();
        
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function createPost(UserValidationFormRequest $request)
    {   

        try {
            if($request->password != $request->password_confirm) {
                return redirect()->back()->with('error','O campo senha e o campo confirmar a senha não coincidem');
            }
            DB::beginTransaction();
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->tipo = $request->tipo;
            $user->cpf = $request->cpf;
            $user->data_de_nascimento = $request->data_de_nascimento;
            $user->telefone = intval($request->telefone);
            $user->cep = intval($request->cep);
            $user->numero = $request->numero;
            $user->logradouro = $request->logradouro;
            $user->complemento = $request->complemento;
            $user->bairro = $request->bairro;
            $user->cidade = $request->cidade;
            $user->uf = $request->uf;

            $user->save();

            DB::commit();
            return redirect()
                    ->route('admin.user')
                    ->with('message', 'Usuário cadastrado com sucesso.');

        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user','id'));
    }

    public function editPost(UserValidationFormRequest $request, $id) {

        try {
            if($request->password != $request->password_confirm) {
                return redirect()->back()->with('error','O campo senha e o campo confirmar a senha não coincidem');
            }
            DB::beginTransaction();
            $user = User::findOrFail($id); 
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->tipo = $request->tipo;
            $user->cpf = $request->cpf;
            $user->data_de_nascimento = $request->data_de_nascimento;
            $user->telefone = intval($request->telefone);
            $user->cep = intval($request->cep);
            $user->numero = $request->numero;
            $user->logradouro = $request->logradouro;
            $user->complemento = $request->complemento;
            $user->bairro = $request->bairro;
            $user->cidade = $request->cidade;
            $user->uf = $request->uf;
            $user->ativo = $request->ativo;
            $user->save();

            DB::commit();
            return redirect()->route('admin.user')->with('message', 'Usuário alterado com sucesso!');

        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
    }

    public function destroy($id) {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->route('admin.user')->with('message', 'Usuário     excluído com sucesso!');
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
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
