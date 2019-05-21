<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\API\ApiError;
use App\Models\Responsavel;

class ResponsavelController extends Controller
{

    /**
	 * @var Responsavel
	 */
	private $responsavel;

	public function __construct(Responsavel $responsavel)
	{
		$this->responsavel = $responsavel;
    }
    
    public function indexApi() {
        return response()->json($this->responsavel->paginate(10)); // ou pode ser all no lugar do paginate
    }

    public function showApi($id)
    {
    	$responsavel = $this->responsavel->find($id);

    	if(! $responsavel) return response()->json(ApiError::errorMessage('Responsável não encontrado!', 4040), 404);

    	$data = ['data' => $responsavel];
	    return response()->json($data);
	}

    public function index()
    {
        return view('admin.responsavel.index');
    }

    public function create()
    {
        return view('admin.responsavel.create');
    }
}
