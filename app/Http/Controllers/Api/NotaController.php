<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\API\ApiError;
use App\Models\Nota;

class NotaController extends Controller
{
     /**
	 * @var Nota
	 */
	private $nota;

	public function __construct(Nota $nota)
	{
		$this->nota = $nota;
    }
    
    public function index() {
        return response()->json($this->nota->paginate(10)); // ou pode ser all no lugar do paginate
    }

    public function show($id)
    {
    	$nota = $this->nota->find($id);

    	if(! $nota) return response()->json(ApiError::errorMessage('Nota não encontrada!', 4040), 404);

    	$data = ['data' => $nota];
	    return response()->json($data);
	}
}
