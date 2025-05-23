<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', config('app.name', 'REFOP'))</title>

    <!-- Styles / Scripts -->
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body class="d-flex flex-column min-vh-100 bg-off-white">

    <header class="bg-azul-escuro text-light p-5 text-center">
        <h1>REFOP</h1>
        <p>Associação das Repúblicas Federais de Ouro Preto</p>
    </header>

    <nav>
        <ul class="nav justify-content-center bg-cinza m-0">
            <li class="nav-item ">
                <a class="nav-link text-white p-3" href="{{ url('/') }}">Início</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white p-3" href="{{ url('/sobre') }}">Sobre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white p-3" href="{{ url('/republicas') }}">Repúblicas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white p-3" href="{{ url('/eventos') }}">Eventos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white p-3" href="{{ url('/galeria') }}">Galeria</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white p-3" href="{{ url('/contato') }}">Contato</a>
            </li>
        </ul>
    </nav>

    <main class="bg-off-white h-100">
        <div class="w-50 mx-auto">
            @yield('content')
        </div>
    </main>

    <footer class="footer mt-auto py-3 bg-azul-escuro">
        <div class="container text-center">
            <span class="text-light">&copy; {{ date('Y') }} REFOP. Todos os direitos
                reservados.</span>
        </div>
    </footer>

    @stack('scripts')
</body>

</html>
