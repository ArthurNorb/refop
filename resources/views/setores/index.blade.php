@extends('layouts.app')

@section('title', 'REFOP - Setores')

@section('content')
    <div class="w-full max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <div class="flex flex-col sm:flex-row justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-refopEscuro mb-4 sm:mb-0">Setores da Organização</h2>

            @if (auth()->check() && auth()->user()->isAdmin())
                <a href="{{ route('setores.create') }}"
                    class="bg-refop hover:bg-refopEscuro text-white font-bold py-2 px-4 rounded transition-colors">
                    + Adicionar Setor
                </a>
            @endif
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200">
            <div class="divide-y divide-gray-200">
                @forelse ($setores as $setor)
                    <a href="{{ route('setores.show', $setor) }}"
                        class="flex items-center justify-between p-4 hover:bg-gray-50 transition-colors duration-200">
                        <span class="font-medium text-gray-800">{{ $setor->nome }}</span>

                        {{-- Ícone de seta (feedback visual) --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                @empty
                    <p class="text-center text-gray-500 p-10">Nenhum setor encontrado.</p>
                @endforelse
            </div>
        </div>

        @if ($setores->hasPages())
            <div class="mt-8">
                {{ $setores->links() }}
            </div>
        @endif
    </div>
<<<<<<< HEAD
@endsection
=======

    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md shadow-sm" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="space-y-6">
        @forelse ($setores as $setor)
            <a href="{{ route('setores.show', $setor) }}" class="block group bg-white rounded-xl shadow-lg hover:shadow-2xl overflow-hidden border border-gray-200 transition-all duration-300">
                <div class="flex flex-col sm:flex-row items-start">
                    
                    @if($setor->imagem)
                    <div class="w-full sm:w-1/3">
                        <img src="{{ asset('storage/' . $setor->imagem) }}" alt="Imagem do setor {{ $setor->nome }}" class="w-full h-48 object-cover">
                    </div>
                    @endif
                    
                    <div class="p-5 sm:p-6 flex-1">
                        <h3 class="text-xl font-semibold text-refop mb-2 group-hover:text-refopEscuro transition-colors">
                            {{ $setor->nome }}
                        </h3>
                        <p class="text-gray-600 text-sm leading-relaxed line-clamp-3">
                            {{ $setor->descricao ?? 'Nenhuma descrição fornecida.' }}
                        </p>
                    </div>

                </div>
            </a>
        @empty
            <p class="text-center text-gray-500 py-10">Nenhum setor encontrado.</p>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $setores->links() }}
    </div>
</div>
@endsection
>>>>>>> origin/producao
