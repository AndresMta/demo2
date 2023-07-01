@extends('layouts.app')

@section('nombre-pagina')
    Pedido
@endsection

@section('contenido')
    <p class="fs-2 mb-5">
        PEDIDO
        <i class="fa-solid fa-box"></i>
    </p>

    <div class="row">
        <div class="col-12 col-md-4 px-4">
            <div class="border-start border-end p-3">
                <p class="fs-3">
                    Número: <span class="fw-bold">#{{ $pedido->id }}</span>
                </p>
                <p class="fs-3">
                    Cliente: <span class="fw-bold">{{ $pedido->cliente->nombreComercio }}</span>
                </p>
                <p class="fs-3">
                    Fecha: <span class="fw-bold">{{ $pedido->fecha }}</span>
                </p>
                <p class="fs-3">
                    Importe: <span class="fw-bold">${{ $pedido->importe }}</span>
                </p>
                <p class="fs-3">
                    Estado: <span class="fw-bold">{{ $pedido->estado }}</span>
                </p>
            </div>
        </div>
        <div class="col-12 col-md-8">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Articulo</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($pedido->articuloPedido as $articuloPedido)
                    <tr>
                        <td>{{ $articuloPedido->articulo->nombre }}</td>
                        <td>{{ $articuloPedido->articulo->descripcion }}</td>
                        <td>${{ $articuloPedido->articulo->precio }}</td>
                        <td>{{ $articuloPedido->cantidad }}</td>
                        <td class="fw-bold">${{ $articuloPedido->cantidad * $articuloPedido->articulo->precio }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
