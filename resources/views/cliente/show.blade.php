@extends('layouts.app')

@section('nombre-pagina')
    Cliente
@endsection

@section('contenido')
    <div class="row mt-5">
        <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end align-items-center">
            <img class="img-fluid" style="max-width: 300px" src="{{ asset('img/user.svg') }}" alt="">
        </div>

        <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-start">
            <p class="fs-4">
                Nombre Comercio: <span class="fw-bold">{{ $cliente->nombreComercio }}</span>
            </p>

            <p class="fs-4">
                Responsable: <span class="fw-bold">{{ $cliente->nombre . " " . $cliente->apellido }}</span>
            </p>

            <p class="fs-4">
                Cuit: <span class="fw-bold">{{ $cliente->cuit }}</span>
            </p>

            <p class="fs-4">
                Ubicacion: <span class="fw-bold">{{ $cliente->ubicacionCliente->calle . ", " . $cliente->ubicacionCliente->numero }}</span>
            </p>
        </div>
    </div>
@endsection
