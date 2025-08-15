@extends('layouts.app')

@section('title', $setor->nome)

@section('content')
    <div class="w-full sm:max-w-5xl mt-6 px-6 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg">

        <div class="flex flex-col sm:flex-row sm:items-center sm:gap-8">
            @if ($setor->imagem)
                <div class="flex-shrink-0 mb-4 sm:mb-0">
                    <img src="{{ asset('storage/' . $setor->imagem) }}" alt="Imagem do Setor {{ $setor->nome }}"
                        class="w-48 h-48 object-cover rounded-lg shadow-md mx-auto">
                </div>
            @endif

            <div class="text-center sm:text-left flex-grow">
                <h1 class="text-4xl font-bold text-gray-800 leading-tight">
                    {{ $setor->nome }}
                </h1>
            </div>
        </div>

        @if ($setor->descricao)
            <div class="mt-8 pt-8 border-t border-gray-200">
                <h2 class="text-xl font-bold text-gray-800 mb-2">Funções:</h2>
                <p class="text-gray-700 whitespace-pre-wrap">{!! $setor->descricao !!}</p>
            </div>
        @endif
        
        <div class="flex items-center justify-end mt-8 border-t pt-6 border-gray-200">
            <a href="{{ route('setores.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 disabled:opacity-25 transition mr-4">
                Voltar para a lista
            </a>
            @auth
                @if (Auth::user()->isAdmin())
                    <a href="{{ route('setores.edit', $setor) }}"
                        class="inline-flex items-center px-4 py-2 bg-refop border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:text-refop hover:border-refop disabled:opacity-25 transition">
                        Editar Setor
                    </a>
                    <form action="{{ route('setores.destroy', $setor) }}" method="POST"
                        onsubmit="return confirm('ATENÇÃO: Você tem certeza que deseja excluir este setor? Esta ação não pode ser desfeita.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="ml-4 inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition">
                            Excluir
                        </button>
                    </form>
                @endif
            @endauth
        </div>
    </div>

@endsection