@extends('layouts.app')

@section('nombre-pagina')
    Inventario
@endsection

@section('contenido')
    <p class="fs-2">
        INVENTARIO
        <i class="fa-solid fa-cookie-bite"></i>
    </p>

    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Categoría</th>
            <th scope="col">Precio</th>
            <th scope="col">Existencias</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($articulos as $articulo)
                <tr>
                    <td>{{ $articulo->nombre }}</td>
                    <td>{{ $articulo->descripcion }}</td>
                    <td>{{ $articulo->categoriaArticulo->nombre }}</td>
                    <td>${{ $articulo->precio }}</td>
                    <td>{{ $articulo->existencias }}</td>
                </tr>
            @endforeach
        </tbody>
      </table>

      {{ $articulos->links() }}
@endsection
