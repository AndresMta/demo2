@extends('layouts.app')

@section('nombre-pagina')
    Nueva Distribución
@endsection

@section('contenido')
    <p class="fs-2 mb-5">
        NUEVA PLANIFICACIÓN DE DISTRIBUCIÓN
        <i class="fa-solid fa-rectangle-list"></i>
    </p>

    <div class="row">
        <div class="col-12 col-md-8">
            <livewire:listado-pedidos />
        </div>
        <div class="col-12 col-md-4 border-start border-end">
            <p class="fs-3 text-center">
                Detalle Distribución
            </p>

            @error('pedidos')
                <div class="alert alert-danger">
                    Debe Seleccionar Al Menos Un Pedido
                </div>
            @enderror

            <table class="table table-borderless mb-3">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody id="pedidosTabla">
                </tbody>
            </table>

            <div class=" mb-3">
                <select form="nuevaDistribucion" class="form-select @error('empleado') border-danger @enderror" name="empleado" id="empleado">
                    @foreach ($distribuidores as $distribuidor)
                        <option value="{{$distribuidor->id}}">{{ $distribuidor->nombre . " " . $distribuidor->apellido }}</option>
                    @endforeach
                </select>
                @error('empleado')
                    <p class="mb-0 text-danger">
                        Este Campo Es Obligatrio
                    </p>
                @enderror

            </div>

            <div class="mb-3">
                <input form="nuevaDistribucion" type="date" name="fecha" class="form-control @error('fecha')border-danger @enderror">
                @error('fecha')
                    <p class="mb-0 text-danger">
                        Este Campo Es Obligatrio
                    </p>
                @enderror
            </div>

            <button form="nuevaDistribucion" type="submit" class="btn btn-primary w-100" id="btnCrearDistribucion" onclick="botonSubmit('btnCrearDistribucion', 'btnCrearDistribucionSpn')">
                Confirmar Planificación
             </button>

             <button type="buttton" class="btn btn-primary w-100 d-none" id="btnCrearDistribucionSpn" disabled>
                 <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
             </button>

            <form id="nuevaDistribucion" action="{{ route('distribucion.store') }}" method="POST">
                @csrf
            </form>
        </div>
    </div>
@endsection
