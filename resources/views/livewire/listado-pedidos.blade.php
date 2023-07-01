<div>
    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Cliente</th>
            <th scope="col">Fecha</th>
            <th scope="col">Importe</th>
            <th scope="col">Estado</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->cliente->nombreComercio }}</td>
                    <td>{{ $pedido->fecha }}</td>
                    <td>${{ $pedido->importe }}</td>
                    <td>{{ $pedido->estado }}</td>
                    <td>
                        <p class="mb-0 link-primary" style="cursor: pointer" onclick="agregarPedido({{$pedido->id}})">
                            Agregar
                        </p>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $pedidos->links() }}
</div>
