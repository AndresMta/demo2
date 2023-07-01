@extends('layouts.app')

@section('nombre-pagina')
    Nueno Empleado
@endsection

@section('contenido')
    <p class="fs-2 mb-5">
        NUEVO EMPLEADO
        <i class="fa-solid fa-person-digging"></i>
    </p>

    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <form action="{{ route('empleados.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <div class="form-floating">
                        <input class="form-control @error('nombre') border-danger @enderror" type="text" name="nombre" id="nombre" placeholder="Nombre" value="{{ old('nombre') }}">
                        <label for="nombre">Nombre:</label>
                    </div>
                    @error('nombre')
                        <p class="mb-0 text-danger">
                            Este Campo Es Obligatrio
                        </p>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="form-floating">
                        <input class="form-control @error('apellido') border-danger @enderror" type="text" name="apellido" id="apellido" placeholder="Apellido" value="{{ old('apellido') }}">
                        <label for="apellido">Apellido:</label>
                    </div>
                    @error('apellido')
                        <p class="mb-0 text-danger">
                            Este Campo Es Obligatrio
                        </p>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="form-floating">
                        <input class="form-control @error('dni') border-danger @enderror" type="text" name="dni" id="dni" placeholder="DNI" value="{{ old('dni') }}">
                        <label for="dni">DNI:</label>
                    </div>
                    @error('dni')
                        <p class="mb-0 text-danger">
                            Este Campo Es Obligatrio
                        </p>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="form-floating">
                        <input class="form-control @error('domicilio') border-danger @enderror" type="text" name="domicilio" id="domicilio" placeholder="Domicilio" value="{{ old('domicilio') }}">
                        <label for="domicilio">Domicilio:</label>
                    </div>
                    @error('domicilio')
                        <p class="mb-0 text-danger">
                            Este Campo Es Obligatrio
                        </p>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="form-floating">
                        <input class="form-control @error('email') border-danger @enderror" type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                        <label for="email">Email:</label>
                    </div>
                    @error('email')
                        <p class="mb-0 text-danger">
                            Este Campo Es Obligatrio
                        </p>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="form-floating">
                        <select class="form-select @error('tipoEmpleado') border-danger @enderror" name="tipoEmpleado" id="tipoEmpleado">
                            <option value="Deposito">Depósito</option>
                            <option value="Distribuidor">Distribuidor</option>
                        </select>
                        <label for="tipoEmpleado">Tipo Empleado:</label>
                    </div>
                    @error('tipoEmpleado')
                        <p class="mb-0 text-danger">
                            Este Campo Es Obligatrio
                        </p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100" id="btnCrearDistribucion" onclick="botonSubmit('btnCrearDistribucion', 'btnCrearDistribucionSpn')">
                    Crear Empleado
                 </button>

                 <button type="buttton" class="btn btn-primary w-100 d-none" id="btnCrearDistribucionSpn" disabled>
                     <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                 </button>

            </form>
        </div>
    </div>
@endsection
