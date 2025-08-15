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
@endsection
