@extends('layouts.app')

@section('nombre-pagina')
    Empleados
@endsection

@section('contenido')
    <p class="fs-2">
        EMPLEADOS
        <i class="fa-solid fa-person-digging"></i>
    </p>

    @if (session('mensaje'))
    <div class="alert alert-danger">
        {{ session('mensaje') }}
    </div>
    @endif

    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Domicilio</th>
            <th scope="col">Email</th>
            <th scope="col">Tipo</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)
                <tr>
                    <td>
                        <a class="text-decoration-none link-primary" href="{{ route('empleados.show', ['empleado' => $empleado]) }}">
                            {{ $empleado->nombre . " " . $empleado->apellido }}
                        </a>
                    </td>
                    <td>{{ $empleado->domicilio }}</td>
                    <td>{{ $empleado->email }}</td>
                    <td>{{ $empleado->tipoEmpleado }}</td>
                    <td>
                        <form action="{{ route('empleados.destroy', ['empleado' => $empleado]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn-danger btn">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>

      {{ $empleados->links() }}
@endsection
