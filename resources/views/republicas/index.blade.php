@extends('layouts.app')

@section('title', 'REFOP - Repúblicas')

@section('content')

    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class='flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8 gap-4'>
            <h1 class="text-3xl font-bold text-gray-800">Repúblicas Federais</h1>
            <div class="flex items-center gap-4">

                <form action="{{ route('republicas.index') }}" method="GET" class="flex items-center gap-2 bg-white p-1 rounded-md border shadow-sm">
                    <select name="genero" id="genero" class="border-none focus:ring-0 text-sm text-gray-600">
                        <option value="">Todos os Gêneros</option>
                        <option value="masculina" {{ ($filtroGenero ?? '') == 'masculina' ? 'selected' : '' }}>Masculina</option>
                        <option value="feminina" {{ ($filtroGenero ?? '') == 'feminina' ? 'selected' : '' }}>Feminina</option>
                        <option value="mista" {{ ($filtroGenero ?? '') == 'mista' ? 'selected' : '' }}>Mista</option>
                    </select>
                    <button type="submit" class="px-3 py-1 bg-refop text-white text-xs font-semibold uppercase rounded hover:bg-refopClaro transition">Filtrar</button>

                    @if(isset($filtroGenero) && $filtroGenero)
                        <a href="{{ route('republicas.index') }}" class="px-3 py-1 bg-gray-200 text-gray-700 text-xs font-semibold uppercase rounded hover:bg-gray-300 transition">Limpar</a>
                    @endif
                </form>
                @auth
                    @if (Auth::user()->isAdmin())
                        <a href="{{ route('republicas.create') }}"
                           class="inline-flex items-center px-4 py-2 bg-refop border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-refopClaro active:bg-refopClaro focus:outline-none focus:border-refopClaro focus:ring focus:ring-refopClaro disabled:opacity-25 transition flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                            Adicionar
                        </a>
                    @endif
                @endauth
            </div>
        </div>

        @if($republicas->isNotEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($republicas as $republica)
                    <a href="{{ route('republicas.show', $republica) }}" class="group bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <div class="aspect-square w-full">
                            @if ($republica->logo)
                                <img src="{{ asset('storage/' . $republica->logo) }}" alt="Logo da {{ $republica->nome }}"
                                     class="h-full w-full object-cover">
                            @else
                                <div class="h-full w-full bg-gray-200 flex items-center justify-center">
                                    <span class="text-4xl font-semibold text-gray-500">{{ substr($republica->nome, 0, 1) }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="p-4">
                            <h2 class="text-lg font-bold text-gray-800 truncate group-hover:text-refop transition-colors">
                                {{ $republica->nome }}
                            </h2>
                            @if ($republica->genero)
                                <div class="mt-2 inline-flex items-center bg-gray-100 text-refop font-semibold px-2 py-0.5 rounded-full text-xs">
                                    {{ ucfirst($republica->genero) }}
                                </div>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="text-center py-16 px-6 bg-white rounded-lg shadow-sm border">
                <h3 class="text-xl font-semibold text-gray-700">Nenhuma república encontrada</h3>
                <p class="text-gray-500 mt-2">Sua busca por repúblicas do gênero "{{ ucfirst($filtroGenero ?? '') }}" não retornou resultados. Tente limpar o filtro.</p>
            </div>
        @endif
    </div>

@endsection