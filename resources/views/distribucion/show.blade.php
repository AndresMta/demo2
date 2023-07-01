@extends('layouts.app')

@section('nombre-pagina')
    Planificación Distribución
@endsection



@section('contenido')
    <div class="row mt-3">
        <div class="col-12 col-md-6">
            <p class="fs-2">
                Distribución {{$distribucion->id}}
                <i class="fa-solid fa-truck-fast"></i>
            </p>
        </div>
        <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end">
            <div class="alert alert-info mb-0">
                Estado: <span class="fw-bold">{{ $distribucion->estado }}</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-4 p-5">
            <div class="border-start border-end">
                <p class="fs-5 mb-0 text-center">
                    Distribuidor Asignado:
                </p>

                <p class="fs-3 fw-bold text-center">
                    {{ $distribucion->empleado->nombre . " " . $distribucion->empleado->apellido }}
                </p>

                <p class="fs-5 mb-0 text-center">
                    Fecha:
                </p>

                <p class="fs-3 fw-bold text-center">
                    {{ $distribucion->fecha }}
                </p>

                <p class="fs-5 mb-0 text-center">
                    Cantidad De Pedidos:
                </p>

                <p class="fs-3 fw-bold text-center">
                    {{ $distribucion->planificacionDistribucionPedido()->count() }}
                </p>
            </div>
        </div>

        <div class="col-12 col-md-8 p-5">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Pedido</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Importe</th>
                    <th scope="col">Estado</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($distribucion->planificacionDistribucionPedido as $pedido)
                        <tr>
                            <td>
                                <a class="text-decoration-none link-primary" href="{{ route('pedidos.show', ['pedido' => $pedido->pedido]) }}">
                                    {{ $pedido->pedido->id }}
                                </a>
                            </td>
                            <td>{{ $pedido->pedido->cliente->nombreComercio}}</td>
                            <td>${{ $pedido->pedido->importe }}</td>
                            <td>{{ $pedido->pedido->estado }}</td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-4 px-5">
            <div class="">
                <a href="{{ route('distribucion.edit', ['planificacionDistribucion' => $distribucion]) }}" class="btn btn-primary w-100 mb-3">
                    Editar
                </a>

                <form action="{{ route('distribucion.destroy', ['planificacionDistribucion' => $distribucion]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger w-100" type="submit">
                        Eliminar
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
