<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\API\ApiError;
use App\Models\Frequencia;


class FrequenciaController extends Controller
{
    /**
	 * @var Frequencia
	 */
	private $frequencia;

	public function __construct(Frequencia $frequencia)
	{
		$this->frequencia = $frequencia;
    }
    
    public function indexApi() {
        return response()->json($this->frequencia->paginate(10)); // ou pode ser all no lugar do paginate
    }

    public function showApi($id)
    {
    	$frequencia = $this->frequencia->find($id);

    	if(! $frequencia) return response()->json(ApiError::errorMessage('Frequência não encontrada!', 4040), 404);

    	$data = ['data' => $frequencia];
	    return response()->json($data);
	}
}
