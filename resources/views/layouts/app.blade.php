<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'REFOP'))</title>

    {{-- Icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="img/LogoREFOP.png">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Styles -->
    @stack('styles')
    @livewireStyles
</head>

<body class="flex flex-col min-h-screen bg-offWhite font-montserrat antialiased">
    <header class="bg-refop text-slate-100 pt-3 px-5 shadow-md">
        <div class="container mx-auto">
            @auth
                <div>
                    <ul class="flex flex-row gap-2 justify-end text-sm text-slate-400">
                        @if (Auth::user()->isAdmin())
                            <li>
                                <a href="{{ route('admin.users.index') }}" class=" hover:text-white">
                                    Gerenciar usuários
                                </a>
                            </li>
                            |
                        @endif
                        <li>
                            <a href="{{ route('meu-perfil') }}" class=" hover:text-white">
                                Meu perfil
                            </a>
                        </li>
                        |
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class=" hover:text-white">
                                    Logout ⟶
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            @endauth
            <div class="flex flex-col sm:flex-row items-center justify-between pb-3">
                <div class="flex items-center">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('img/LogoREFOP.png') }}" alt="REFOP Logo" class="w-20 md:w-24 h-auto mr-4">
                    </a>
                    <div>
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('img/REFOP.png') }}" alt="REFOP Nome" class="w-24 md:w-32 h-auto mb-1">
                        </a>
                        <p class="text-xs sm:text-sm">Associação das Repúblicas Federais de Ouro Preto</p>
                    </div>
                </div>

                <div class="w-full sm:w-auto mt-4 sm:mt-0 sm:ml-auto md:w-1/3 lg:w-1/4">
                    <form action="{{ route('search.index') }}" method="GET" class="flex" role="search">
                        <input
                            class="appearance-none block w-full bg-white text-gray-700 border border-gray-300 rounded-l-md py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-slate-500 placeholder-gray-400"
                            type="search" name="term" placeholder="Pesquisar..."
                            aria-label="Pesquisar" value="{{ request('term') }}"> 
                        <button
                            class="px-4 py-2 text-white bg-refop hover:bg-refopEscuro rounded-r-md transition duration-150"
                            type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
            </div>

            <nav>
                <ul class="flex flex-wrap justify-center list-none p-0 m-0">
                    <li class="nav-item">
                        <a class="block text-white hover:bg-refopClaro px-3 py-3 font-semibold transition-colors duration-150 {{ Request::is('/') ? 'bg-refopClaro' : '' }}"
                            href="{{ url('/') }}">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="block text-white hover:bg-refopClaro px-3 py-3 font-semibold transition-colors duration-150 {{ Request::is('artigos') ? 'bg-refopClaro' : '' }}"
                            href="{{ route('artigos.index') }}">Artigos</a>
                    </li>
                    <li class="nav-item">
                        <a class="block text-white hover:bg-refopClaro px-3 py-3 font-semibold transition-colors duration-150 {{ Request::is('republicas') ? 'bg-refopClaro' : '' }}"
                            href="{{ route('republicas.index') }}">Repúblicas</a>
                    </li>
                    <li class="nav-item">
                        <a class="block text-white hover:bg-refopClaro px-3 py-3 font-semibold transition-colors duration-150 {{ Request::is('eventos') ? 'bg-refopClaro' : '' }}"
                            href="{{ route('eventos.index') }}">Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a class="block text-white hover:bg-refopClaro px-3 py-3 font-semibold transition-colors duration-150 {{ Request::is('galeria') ? 'bg-refopClaro' : '' }}"
                            href="{{ route('galeria.index') }}">Galeria</a>
                    </li>
                    <li class="nav-item">
                        <a class="block text-white hover:bg-refopClaro px-3 py-3 font-semibold transition-colors duration-150 {{ Request::is('contato') ? 'bg-refopClaro' : '' }}"
                            href="{{ url('/contato') }}">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a class="block text-white hover:bg-refopClaro px-3 py-3 font-semibold transition-colors duration-150 {{ Request::is('sobre') ? 'bg-refopClaro' : '' }}"
                            href="{{ route('sobre.show') }}">Sobre</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="flex-grow py-8">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>

    <footer class="mt-auto py-6 bg-refop text-offWhite relative">
        <div id="igreja-decorativa-fundo"></div>

        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">

                <div class="text-center md:text-left">
                    <p class="text-sm">&copy; {{ date('Y') }} REFOP. Todos os direitos reservados.</p>
                    <a href="https://www.linkedin.com/in/arthur-norberto-585412205/" target="_blank"
                        rel="noopener noreferrer" class="text-xs opacity-75 mt-1">
                        Desenvolvido por Arthur Norberto (Pirulito)
                    </a>
                </div>

                <div class="flex items-center gap-6">
                    @guest
                        <a href="{{ url('/login') }}" class="text-sm hover:underline">Login</a>
                    @endguest

                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="text-sm hover:underline bg-transparent border-none p-0 cursor-pointer text-offWhite">
                                Sair
                            </button>
                        </form>
                    @endauth

                    <a href="https://ufop.br/" target="_blank" rel="noopener noreferrer"
                        class="text-sm hover:underline">
                        UFOP
                    </a>

                    <a href="https://www.instagram.com/pagrefop" target="_blank" rel="noopener noreferrer"
                        aria-label="Instagram da REFOP" class="hover:opacity-80 transition-opacity">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-instagram" viewBox="0 0 16 16">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                        </svg>
                    </a>
                </div>

            </div>
        </div>
    </footer>
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @stack('scripts')

    @livewireScripts
</body>

</html>
