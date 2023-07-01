<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Iniciar Sesión</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <script src="/js/bootstrap.bundle.min.js"></script>
        <script src="/js/main.js"></script>
    </head>
    <body class="">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center p-5" style="min-height: 100vh;">
                <div class="col-12 col-md-4 border p-5 shadow-sm rounded-2">
                    <div class="row justify-content-center mb-5">
                        <p class="fs-1 border-top border-bottom w-auto">
                            <span class="fw-bold">GF</span><span class="fw-light">Gerencia</span>
                        </p>
                    </div>
                    <div class="row">
                        <div class="col">

                            @if (session('login-error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('login-error') }}
                                </div>
                            @endif

                            <form action="{{ route('login') }}" method="POST">
                                @csrf

                                <div class="mb-4">
                                    <div class="form-floating ">
                                        <input
                                            type="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            id="email"
                                            name="email"
                                            placeholder="name@example.com"
                                            value="{{ old('email') }}"
                                        >
                                        <label for="floatingInput">Usuario:</label>
                                    </div>

                                    @error('email')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <div class="form-floating">
                                        <input
                                            type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            id="password"
                                            name="password"
                                            placeholder="Password">
                                        <label for="floatingPassword">Password:</label>
                                    </div>
                                    @error('password')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary w-100" id="btnLogin" onclick="botonSubmit('btnLogin', 'btnLoginSpn')">
                                    Iniciar Sesión
                                 </button>

                                 <button type="buttton" class="btn btn-primary w-100 d-none" id="btnLoginSpn" disabled>
                                     <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                 </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
