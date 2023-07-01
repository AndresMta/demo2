@extends('layouts.app')

@section('nombre-pagina')
    Empleado
@endsection

@section('contenido')
    <div class="row mt-5">
        <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end align-items-center">
            <img class="img-fluid" style="max-width: 300px" src="{{ asset('img/user.svg') }}" alt="">
        </div>

        <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-start">
            <p class="fs-4">
                Nombre: <span class="fw-bold">{{ $empleado->nombre . " " . $empleado->apellido }}</span>
            </p>

            <p class="fs-4">
                Domicilio: <span class="fw-bold">{{ $empleado->domicilio }}</span>
            </p>

            <p class="fs-4">
                Email: <span class="fw-bold">{{ $empleado->email }}</span>
            </p>

            <p class="fs-4">
                Tipo: <span class="fw-bold">{{ $empleado->tipoEmpleado }}</span>
            </p>
        </div>
    </div>
@endsection
