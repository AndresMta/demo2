<?php

namespace App\Http\Controllers;

//Models
use App\Models\Empleado;
use App\Models\Cliente;
use App\Models\Articulo;
use App\Models\CategoriaArticulo;
use App\Models\UbicacionCliente;
use App\Models\Pedido;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerfilController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Función para mostrar la vista de inicio.
     */
    public function index() {
        //Consulto la cantidad de productos que hay de cada categoría.
        $categoriasArticulosCount = DB::table('articulos')
            ->leftJoin('categoria_articulos', 'categoria_articulos.id', '=', 'articulos.categoria_articulo_id')
            ->select( 'categoria_articulos.nombre', DB::raw('count(*) as total'))
            ->groupBy('nombre')
            ->get();

        //Consulto la cantidad de pedidos en cada estado.
        $estadosPedido = [
            'Rechazado',
            'No Entregado',
            'Entregado',
            'En Distribucion',
            'Armado',
            'Pendiente'
        ];

        $estadosPedidosCantidad = [];
        foreach ($estadosPedido as $estado) {
            $estadosPedidosCantidad[$estado] = Pedido::where('estado', $estado)->count();
        }

        //Retorno la vista.
        return view('perfil.inicio', [
            'categoriasArticulos'    => $categoriasArticulosCount,
            'cantidadArticulos'      => Articulo::all()->count(),
            'cantidadClientes'       => Cliente::all()->count(),
            'estadosPedidosCantidad' => $estadosPedidosCantidad,
            'cantidadPedidos'        => Pedido::all()->count()
        ]);
    }
}
