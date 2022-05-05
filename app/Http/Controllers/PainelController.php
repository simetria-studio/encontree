<?php

namespace App\Http\Controllers;

use App\Models\PreCadastro;
use Illuminate\Http\Request;

class PainelController extends Controller
{
    public function index()
    {
        return view('painel.index');
    }

    public function empresas()
    {
        $empresas = PreCadastro::all();
        return view('painel.empresas', get_defined_vars());
    }
}
