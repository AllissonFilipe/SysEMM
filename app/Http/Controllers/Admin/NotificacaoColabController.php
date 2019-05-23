<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificacaoColabController extends Controller
{
	public function index()
    {
        return view('admin.notificacaoColab.index');
    }

    public function create()
    {
        return view('admin.notificacaoColab.create');
    }
}
