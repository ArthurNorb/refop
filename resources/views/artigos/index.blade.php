@extends('layouts.app')
@section('title', 'REFOP - Artigos')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-refopEscuro">Artigos e Publicações</h1>
            @auth
                <a href="{{ route('artigos.create') }}"
                    class="bg-refop hover:bg-refopEscuro text-white font-bold py-2 px-4 rounded transition-colors">
                    Escrever Artigo
                </a>
            @endauth
        </div>

        <div class="space-y-8">
            @forelse ($articles as $article)
                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden transition-shadow duration-300 hover:shadow-2xl flex flex-col md:h-56">
                    <div class="flex flex-col md:flex-row h-full">

                        @if ($article->image_path)
                            <div class="w-full md:w-1/3 h-48 md:h-full flex-shrink-0">
                                <a href="{{ route('artigos.show', $article) }}">
                                    <img src="{{ Storage::url($article->image_path) }}" alt="{{ $article->title }}"
                                        class="h-full w-full object-cover">
                                </a>
                            </div>
                        @endif

                        <div class="p-6 flex flex-col justify-between flex-1">
                            <div>
                                <h2 class="text-2xl font-bold text-refopEscuro mb-2">
                                    <a href="{{ route('artigos.show', $article) }}"
                                        class="hover:text-refop">{{ $article->title }}</a>
                                </h2>
                                <p class="text-sm text-gray-600 mb-4">
                                    Por {{ $article->user->name }} em {{ $article->created_at->format('d/m/Y') }}
                                </p>
                                <p class="text-gray-700 leading-relaxed line-clamp-3">
                                    {{ $article->excerpt }}
                                </p>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('artigos.show', $article) }}"
                                    class="text-refop font-semibold hover:underline">Ler mais &rarr;</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500 py-10">Nenhum artigo publicado ainda.</p>
            @endforelse
        </div>

        <div class="mt-12">{{ $articles->links() }}</div>
    </div>
@endsection