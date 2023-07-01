<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('nombre-pagina<')</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <script src="/js/bootstrap.bundle.min.js"></script>
        <script src="/js/main.js"></script>
        <script src="https://kit.fontawesome.com/675bb23e7a.js" crossorigin="anonymous"></script>
        @livewireStyles
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary px-5 py-2">
            <div class="container-fluid">
                <a class="navbar-brand border-top border-bottom fs-4" href="{{ route('perfil.index') }}">
                    <span class="fw-bold">FG</span><span class="fw-lighter">Gerencia</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link text-reset dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Empleados
                            </a>
                            <ul class="dropdown-menu bg-body-tertiary">
                                <li>
                                    <a class="dropdown-item" href="{{ route('empleados.create') }}">
                                        Nuevo
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('empleados.index') }}">
                                        Ver Todos
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-reset" href="{{ route('clientes.index') }}">
                                Clientes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-reset" href="{{ route('articulos.index') }}">
                                Inventario
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-reset" href="{{ route('pedidos.index') }}">
                                Pedidos
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link text-reset dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Distribución
                            </a>
                            <ul class="dropdown-menu bg-body-tertiary">
                                <li>
                                    <a class="dropdown-item" href="{{ route('distribucion.create') }}">
                                        Nueva
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('distribucion.index') }}">
                                        Ver Todas
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <div class="">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <input type="submit" value="Cerrar Sesión" class="nav-link text-reset">
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <main class="px-5 py-2">
            @yield('contenido')
        </main>

        @livewireScripts
    </body>
</html>
