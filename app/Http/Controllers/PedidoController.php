<?php

namespace App\Http\Controllers;

//Models
use App\Models\Pedido;

use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function show(Pedido $pedido) {
        return view('pedido.show', [
            'pedido' => $pedido
        ]);
    }

    public function index() {
        $pedidos = Pedido::paginate(10);

        return view('pedido.listado', [
            'pedidos' => $pedidos,
            'pendiente' => Pedido::where('estado', 'Pendiente')->count(),
            'armado' => Pedido::where('estado', 'Armado')->count(),
            'distribucion' => Pedido::where('estado', 'En Distribucion')->count(),
            'entregado' => Pedido::where('estado', 'Entregado')->count(),
            'noEntregado' => Pedido::where('estado', 'No Entregado')->count(),
            'rechazado' => Pedido::where('estado', 'Rechazado')->count()
        ]);
    }
}
