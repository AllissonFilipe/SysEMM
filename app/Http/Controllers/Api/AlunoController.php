<?php

namespace App\Http\Controllers\Api;

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
    
    public function index() {
        return response()->json($this->aluno->paginate(10)); // ou pode ser all no lugar do paginate
    }

    public function show($id)
    {
    	$aluno = $this->aluno->find($id);

    	if(! $aluno) return response()->json(ApiError::errorMessage('Aluno não encontrado!', 4040), 404);

    	$data = ['data' => $aluno];
	    return response()->json($data);
	}
}
