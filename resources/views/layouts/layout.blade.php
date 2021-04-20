<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/"><img src="https://images.emojiterra.com/google/android-pie/512px/2695.png" alt="logo" width="50" style="margin-left: 10px;" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample04">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Principal</a>
                </li>
            </ul>

            <div class="text-right">
                <!-- Si está logueado, se muestra esto -->
                <!-- <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="buton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Opciones de Perfil
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="">Nombre</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Editar Perfil</a>
                                <a class="dropdown-item" href="#">Editar Contraseña</a>
                                <a class="dropdown-item" href="#">Nombre</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<%=request.getContextPath()%>/Admin/editar">Editar Correo y Contraseña</a>
                            <form method="GET" action="<%= request.getContextPath() %>/Login/logout">
                                <input type="submit" class="dropdown-item" value="Cerrar Sesión">
                            </form>
                        </div>
                    </li>
                </ul> -->

                <!-- Si no está logueado, se muestra esto -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item text-right">
                        <a class="nav-link" href="{{ url('/login') }}">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item text-right">
                        <a class="nav-link" href="{{ url('/register') }}">Registrarme</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="app">
        @yield('content')
    </div>
    
    <footer class="mt-auto py-3 bg-dark text-white">
        <div class="container text-center">
            <span class="text-muted">MedicApp&#174; <span class="font-weight-bold">2021</span> Todos los derechos reservados.</span>
        </div>
    </footer>
</body>
</html>