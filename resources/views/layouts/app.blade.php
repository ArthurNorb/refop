<!DOCTYPE html> {{-- xupa upa --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', config('app.name', 'REFOP'))</title>

    {{-- Icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Styles / Scripts --}}
    <link rel="stylesheet" href="{{ asset('css/background.css') }}">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body class="d-flex flex-column min-vh-100 bg-off-white">

    <header class="bg-azul-escuro text-light pt-3 px-5">
        <div class="d-flex align-items-center justify-content-start">
            <img src="img/LogoREFOP.png" alt="REFOP" style="width: 8rem; height: auto; margin-right: 1rem">
            <div>
                <h1>REFOP</h1>
                <p>Associação das Repúblicas Federais de Ouro Preto</p>
            </div>

            <div class="ms-auto w-25">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                    <button class="btn btn-outline-light" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>
        </div>

        <nav>
        <ul class="nav justify-content-center m-0">
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
    </header>

    <main class="h-100">
        <div class="w-50 mx-auto">
            @yield('content')
        </div>
    </main>

    <div id="igreja-decorativa-fundo"></div>

    <footer class="footer mt-auto py-3 bg-azul-escuro">
        <div class="container text-center">
            <span class="text-light">&copy; {{ date('Y') }} REFOP. Todos os direitos
                reservados.</span>
        </div>
    </footer>

    @stack('scripts')
</body>

</html>
