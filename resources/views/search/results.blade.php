@extends('layouts.app')

@section('title', 'Resultados da Busca por "' . $term . '"')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-3xl font-bold text-refopEscuro mb-6">
        Resultados da busca por: <span class="text-refop">"{{ $term }}"</span>
    </h1>

    <div class="space-y-6">
        @forelse ($results as $result)
            
            @if ($result instanceof \App\Models\Article)
                <a href="{{ route('artigos.show', $result) }}" class="block p-5 bg-white rounded-lg shadow hover:shadow-xl transition-shadow">
                    <div class="flex items-center gap-4">
                        <span class="flex-shrink-0 bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">Artigo</span>
                        <div>
                            <p class="font-semibold text-refop text-lg">{{ $result->title }}</p>
                            <p class="text-sm text-gray-600 truncate">{{ $result->excerpt }}</p>
                        </div>
                    </div>
                </a>
            @elseif ($result instanceof \App\Models\Event)
                <a href="{{ route('eventos.show', $result) }}" class="block p-5 bg-white rounded-lg shadow hover:shadow-xl transition-shadow">
                     <div class="flex items-center gap-4">
                        <span class="flex-shrink-0 bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">Evento</span>
                        <div>
                            <p class="font-semibold text-refop text-lg">{{ $result->title }}</p>
                            <p class="text-sm text-gray-600">Em {{ $result->location_name }} no dia {{ $result->event_datetime->format('d/m/Y') }}</p>
                        </div>
                    </div>
                </a>
            @elseif ($result instanceof \App\Models\Republica)
                <a href="{{ route('republicas.show', $result) }}" class="block p-5 bg-white rounded-lg shadow hover:shadow-xl transition-shadow">
                    <div class="flex items-center gap-4">
                        <span class="flex-shrink-0 bg-purple-100 text-purple-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">República</span>
                        <div>
                            <p class="font-semibold text-refop text-lg">{{ $result->nome }}</p>
                            <p class="text-sm text-gray-600">Localizada no bairro {{ $result->bairro }}</p>
                        </div>
                    </div>
                </a>
            @endif

        @empty
            <div class="text-center py-10 bg-white rounded-lg shadow">
                <p class="text-xl text-gray-700">Nenhum resultado encontrado.</p>
                <p class="text-gray-500 mt-2">Tente pesquisar por outras palavras-chave.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection