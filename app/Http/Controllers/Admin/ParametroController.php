<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Parametro;
use App\Http\Requests\ParametroValidationFormRequest;
use Illuminate\Support\Facades\Input;

class ParametroController extends Controller
{
    public function index()
    {
        $parametros = Parametro::paginate(10);
        $total = Parametro::all()->count();
        return view('admin.parametro.index', compact('parametros','total'));
    }

    public function search() {
        
        $q = Input::get ( 'q' );
        $parametros = Parametro::where('chave','LIKE','%'.$q.'%')->paginate(10);
        $total = count($parametros);
        if(count($parametros) > 0)
            return view('admin.parametro.index', compact('parametros','total'));
        else 
            return redirect()->back();
        
    }

    public function create()
    {
        return view('admin.parametro.create');
    }

    public function createPost(ParametroValidationFormRequest $request)
    {   
        
        try {
            DB::beginTransaction();
            $parametro = new Parametro();
            $parametro->chave = $request->chave;
            $parametro->tipo = $request->tipo;
            $parametro->valor_inteiro = $request->valor_inteiro;
            $parametro->valor_decimal = $request->valor_decimal;
            $parametro->valor_data = $request->valor_data;
            $parametro->valor_logico = $request->valor_logico;
            $parametro->valor_texto = $request->valor_texto;
            $parametro->save();
            
            DB::commit();
            return redirect()
                        ->route('admin.parametro')
                        ->with('message', 'Parametro cadastrado com sucesso.');

        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
        

    }

    public function edit($id) {
        $parametro = Parametro::findOrFail($id);
        return view('admin.parametro.edit', compact('parametro','id'));
    }

    public function editPost(ParametroValidationFormRequest $request, $id) {

        try {
            DB::beginTransaction();
            $parametro = Parametro::findOrFail($id); 
            $parametro->chave = $request->chave;
            $parametro->tipo = $request->tipo;
            $parametro->valor_inteiro = $request->valor_inteiro;
            $parametro->valor_decimal = $request->valor_decimal;
            $parametro->valor_data = $request->valor_data;
            $parametro->valor_logico = $request->valor_logico;
            $parametro->valor_texto = $request->valor_texto;
            $parametro->save();
           
            DB::commit();
            return redirect()->route('admin.parametro')->with('message', 'Parametro alterado com sucesso!');
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
    }

    public function destroy($id) {
        try {
            $parametro = Parametro::findOrFail($id);
            $parametro->delete();
            return redirect()->route('admin.parametro')->with('message', 'Parametro excluído com sucesso!');
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
        
    }
}
