@extends('layouts.app')

@section('nombre-pagina')
    Planificaciónes Distribución
@endsection

@section('contenido')
    <p class="fs-2">
        PLANIFICACIONES DISTRIBUCION
        <i class="fa-solid fa-truck-fast"></i>
    </p>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Distribuidor</th>
            <th scope="col">Fecha</th>
            <th scope="col">Estado</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($distribuciones as $distribucion)
                <tr>
                    <td>
                        <a class="text-decoration-none link-primary" href="{{ route('distribucion.show', ['planificacionDistribucion' => $distribucion]) }}">
                            {{ $distribucion->id }}
                        </a>
                    </td>
                    <td>{{ $distribucion->empleado->nombre . " " .  $distribucion->empleado->apellido }}</td>
                    <td>{{ $distribucion->fecha }}</td>
                    <td>{{ $distribucion->estado }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $distribuciones->links() }}
@endsection
