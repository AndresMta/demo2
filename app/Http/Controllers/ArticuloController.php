<?php

namespace App\Http\Controllers;

//Models
use App\Models\Articulo;

use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $articulos = Articulo::paginate(10);

        return view('inventario.listado', [
            'articulos' => $articulos
        ]);
    }
}
