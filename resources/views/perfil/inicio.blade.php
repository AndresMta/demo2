@extends('layouts.app')

@section('nombre-pagina')
    Inicio
@endsection

@section('contenido')
    <div class="row">
        <div class="col-12 col-md-6 p-4">
            <div class="border rounded-2 shadow-sm p-4 h-100" style="min-height: 300px">
                <p class="fs-3 text-center fw-bold">
                    Inventario
                </p>

                <p class="fs-4 p-2 bg-body-tertiary rounded d-flex justify-content-between">
                    <span>Articulos:</span> <span>{{ $cantidadArticulos }}</span>
                </p>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Categoría</th>
                            <th scope="col">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categoriasArticulos as $categoria)
                            <tr>
                                <td>{{ $categoria->nombre }}</td>
                                <td>{{ $categoria->total }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-12 col-md-6 p-4">
            <div class="border rounded-2 shadow-sm p-4 h-100" style="min-height: 300px">
                <p class="fs-3 text-center fw-bold">
                    Historial De Pedidos
                </p>

                <p class="fs-4 p-2 bg-body-tertiary rounded d-flex justify-content-between">
                    <span>Total:</span> <span>{{ $cantidadPedidos }}</span>
                </p>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Estado</th>
                            <th scope="col">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($estadosPedidosCantidad as $estado => $cantidad)
                            <tr>
                                <td>{{ $estado }}</td>
                                <td>{{ $cantidad }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        {{-- <div class="col-12 col-md-3 p-4">
            <div class="border rounded-2 shadow-sm p-4 h-100" style="min-height: 300px">
                <p class="fs-3 text-center fw-bold">
                    Pedidos Pendientes
                </p>
                <p class="fs-3 text-center">
                    {{ $cantidadClientes }}
                </p>
            </div>
        </div> --}}
    </div>
@endsection
