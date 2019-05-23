<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ResponsavelController extends Controller
{

    public function index()
    {
        return view('admin.responsavel.index');
    }

    public function create()
    {
        return view('admin.responsavel.create');
    }
}
