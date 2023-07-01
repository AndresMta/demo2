<?php

namespace App\Http\Livewire;

//Models
use App\Models\Pedido;

use Illuminate\Support\Carbon;

use Livewire\Component;
use Livewire\WithPagination;

class ListadoPedidos extends Component
{
    use WithPagination;

    PUBLIC
        $fecha = '';

    PRIVATE
        $pedidos;

    PROTECTED
        $paginationTheme = 'bootstrap';

    public function filtrar() {

    }

    public function render() {
        return view('livewire.listado-pedidos', [
            'pedidos' => Pedido::where('estado', 'Armado')->paginate(5)
        ]);
    }
}
