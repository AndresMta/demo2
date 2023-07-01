@extends('layouts.app')

@section('nombre-pagina')
    Clientes
@endsection

@section('contenido')
    <p class="fs-2">
        CLIENTES
        <i class="fa-solid fa-user-tie"></i>
    </p>

    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Cuit</th>
            <th scope="col">Email</th>
            <th scope="col">Dirección</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>
                        <a class="text-decoration-none link-primary" href="{{ route('clientes.show', ['cliente' => $cliente]) }}">
                            {{ $cliente->nombreComercio }}
                        </a>
                    </td>
                    <td>{{ $cliente->cuit }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->ubicacionCliente->calle . " " .  $cliente->ubicacionCliente->numero }}</td>
                </tr>
            @endforeach
        </tbody>
      </table>

      {{ $clientes->links() }}
@endsection
