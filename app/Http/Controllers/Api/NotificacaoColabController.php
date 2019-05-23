<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\API\ApiError;
use App\Models\NotificacaoColab;

class NotificacaoColabController extends Controller
{
     /**
	 * @var NotificacaoColab
	 */
	private $notificacaoColab;

	public function __construct(NotificacaoColab $notificacaoColab)
	{
		$this->notificacaoColab = $notificacaoColab;
    }
    
    public function index() {
        return response()->json($this->notificacaoColab->paginate(10)); // ou pode ser all no lugar do paginate
    }

    public function show($id)
    {
    	$notificacaoColab = $this->notificacaoColab->find($id);

    	if(! $notificacaoColab) return response()->json(ApiError::errorMessage('Notificação de Colaborador não encontrado!', 4040), 404);

    	$data = ['data' => $notificacaoColab];
	    return response()->json($data);
	}
}
