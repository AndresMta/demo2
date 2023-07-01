@extends('layouts.app')

@section('nombre-pagina')
    PEDIDOS
    <i class="fa-solid fa-boxes-stacked"></i>
@endsection

@section('contenido')
    <p class="fs-2">
        PEDIDOS
        <i class="fa-solid fa-boxes-stacked"></i>
    </p>

    <div class="row my-4">
        <div class="col-12 col-md-2">
            <div class="border row-gap-md-2 shoadow p-2">
                <p class="fs-5 text-center mb-0">
                    Pendiete
                </p>
                <p class="fs-2 fw-bold text-center">
                    {{ $pendiente }}
                </p>
            </div>
        </div>

        <div class="col-12 col-md-2">
            <div class="border row-gap-md-2 shoadow p-2">
                <p class="fs-5 text-center mb-0">
                    Armado
                </p>
                <p class="fs-2 fw-bold text-center">
                    {{ $armado }}
                </p>
            </div>
        </div>

        <div class="col-12 col-md-2">
            <div class="border row-gap-md-2 shoadow p-2">
                <p class="fs-5 text-center mb-0">
                    En Distribución
                </p>
                <p class="fs-2 fw-bold text-center">
                    {{ $distribucion }}
                </p>
            </div>
        </div>

        <div class="col-12 col-md-2">
            <div class="border row-gap-md-2 shoadow p-2">
                <p class="fs-5 text-center mb-0">
                    Entregado
                </p>
                <p class="fs-2 fw-bold text-center">
                    {{ $entregado }}
                </p>
            </div>
        </div>

        <div class="col-12 col-md-2">
            <div class="border row-gap-md-2 shoadow p-2">
                <p class="fs-5 text-center mb-0">
                    No Entregado
                </p>
                <p class="fs-2 fw-bold text-center">
                    {{ $noEntregado }}
                </p>
            </div>
        </div>

        <div class="col-12 col-md-2">
            <div class="border row-gap-md-2 shoadow p-2">
                <p class="fs-5 text-center mb-0">
                    Rechazado
                </p>
                <p class="fs-2 fw-bold text-center">
                    {{ $rechazado }}
                </p>
            </div>
        </div>
    </div>

    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Cliente</th>
            <th scope="col">Fecha</th>
            <th scope="col">Importe</th>
            <th scope="col">Estado</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
                <tr>
                    <td>
                        <a class="text-decoration-none link-primary" href="{{ route('pedidos.show', ['pedido' => $pedido]) }}">
                            {{ $pedido->id }}
                        </a>
                    </td>
                    <td>
                        <a class="text-decoration-none link-primary" href="{{ route('clientes.show', ['cliente' => $pedido->cliente]) }}">
                            {{ $pedido->cliente->nombreComercio }}
                        </a>
                    </td>
                    <td>{{ $pedido->fecha }}</td>
                    <td>${{ $pedido->importe }}</td>
                    <td>{{ $pedido->estado }}</td>
                </tr>
            @endforeach
        </tbody>
      </table>

      {{ $pedidos->links() }}
@endsection
