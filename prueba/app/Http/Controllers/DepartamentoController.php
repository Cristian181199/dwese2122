<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function index()
    {
        return view('departamentos.index');
    }

    public function create()
    {
        return view('departamentos.create');
    }

    public function show($departamento)
    {
        return view('departamentos.show',
                   ['departamento' => $departamento] /*compact('departamento')*/);
    }
}
