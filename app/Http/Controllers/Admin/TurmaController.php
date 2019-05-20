<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TurmaController extends Controller
{
    public function index()
    {
        return view('admin.turma.index');
    }


    public function create()
    {
        return view('admin.turma.create');
    }
}
