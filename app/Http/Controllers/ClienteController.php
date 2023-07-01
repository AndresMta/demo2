<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Models
use App\Models\Cliente;


class ClienteController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function show(Cliente $cliente) {
        return view('cliente.show', [
            'cliente' => $cliente
        ]);
    }

    public function index() {
        $clientes = Cliente::paginate(10);

        return view('cliente.listado', [
            'clientes' => $clientes
        ]);
    }
}
