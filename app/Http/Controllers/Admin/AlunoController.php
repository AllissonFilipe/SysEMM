<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\API\ApiError;
use App\Models\Aluno;

class AlunoController extends Controller
{
     /**
	 * @var Aluno
	 */
	private $aluno;

	public function __construct(Aluno $aluno)
	{
		$this->aluno = $aluno;
    }
    
    public function indexApi() {
        return response()->json($this->aluno->paginate(10)); // ou pode ser all no lugar do paginate
    }

    public function showApi($id)
    {
    	$aluno = $this->aluno->find($id);

    	if(! $aluno) return response()->json(ApiError::errorMessage('Aluno não encontrado!', 4040), 404);

    	$data = ['data' => $aluno];
	    return response()->json($data);
	}
	
	public function index()
    {
        return view('admin.aluno.index');
    }


    public function create()
    {
        return view('admin.aluno.create');
    }
}
