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

    <!-- Styles -->
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
                                <a href="{{ route('admin.user.create_form') }}" class=" hover:text-white">
                                    Cadastrar usuário
                                </a>
                            </li>
                        @endif
                        <li>
                            <a href="{{ route('profile.show') }}" class=" hover:text-white">
                                Editar perfil
                            </a>
                        </li>
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
                        <img src="{{ asset('img/LogoREFOP.png') }}" alt="REFOP Logo" class="w-24 md:w-32 h-auto mr-4">
                    </a>
                    <div>
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('img/REFOP.png') }}" alt="REFOP Nome" class="w-32 md:w-40 h-auto mb-1">
                        </a>
                        <p class="text-xs sm:text-sm">Associação das Repúblicas Federais de Ouro Preto</p>
                    </div>
                </div>

                <div class="w-full sm:w-auto mt-4 sm:mt-0 sm:ml-auto md:w-1/3 lg:w-1/4">
                    <form class="flex" role="search">
                        <input
                            class="appearance-none block w-full bg-white text-gray-700 border border-gray-300 rounded-l-md py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-slate-500 placeholder-gray-400"
                            type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                        <button
                            class="px-4 py-2 border-t border-b border-r border-white text-white bg-refop hover:bg-refopClaro rounded-r-md transition duration-150"
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
                        <a class="block text-white hover:bg-refopClaro px-3 py-3 font-semibold transition-colors duration-150 {{ Request::is('sobre') ? 'bg-refopClaro' : '' }}"
                            href="{{ url('/sobre') }}">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="block text-white hover:bg-refopClaro px-3 py-3 font-semibold transition-colors duration-150 {{ Request::is('republicas') ? 'bg-refopClaro' : '' }}"
                            href="{{ url('/republicas') }}">Repúblicas</a>
                    </li>
                    <li class="nav-item">
                        <a class="block text-white hover:bg-refopClaro px-3 py-3 font-semibold transition-colors duration-150 {{ Request::is('eventos') ? 'bg-refopClaro' : '' }}"
                            href="{{ url('/eventos') }}">Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a class="block text-white hover:bg-refopClaro px-3 py-3 font-semibold transition-colors duration-150 {{ Request::is('galeria') ? 'bg-refopClaro' : '' }}"
                            href="{{ url('/galeria') }}">Galeria</a>
                    </li>
                    <li class="nav-item">
                        <a class="block text-white hover:bg-refopClaro px-3 py-3 font-semibold transition-colors duration-150 {{ Request::is('contato') ? 'bg-refopClaro' : '' }}"
                            href="{{ url('/contato') }}">Contato</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="flex-grow py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>

    <footer class="mt-auto py-4 bg-refop text-offWhite">
        <div id="igreja-decorativa-fundo"></div>
        <div class="container mx-auto text-center px-4">
            <span class="">&copy; {{ date('Y') }} REFOP. Todos os direitos reservados.</span>
        </div>
    </footer>

    @stack('scripts')

    @livewireScripts
</body>

</html>
