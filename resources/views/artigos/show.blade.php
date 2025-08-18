@extends('layouts.app')
@section('title', 'REFOP - ' . $article->title)

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <article class="max-w-4xl mx-auto">
        @if($article->image_path)
            <img src="{{ Storage::url($article->image_path) }}" alt="{{ $article->title }}" class="w-full h-auto max-h-[500px] object-cover rounded-xl mb-8 shadow-lg">
        @endif

        <div class="bg-white p-8 rounded-xl shadow-lg">
            <h1 class="text-4xl font-bold text-refopEscuro mb-4">{{ $article->title }}</h1>
            <p class="text-gray-600 mb-6">
                Por <span class="font-semibold">{{ $article->user->name }}</span> em {{ $article->created_at->translatedFormat('d \d\e F \d\e Y') }}
            </p>

            <div class="prose max-w-none text-gray-800 break-words">
                {!! $article->body !!}
            </div>

            <div class="mt-8 pt-6 border-t flex gap-4">
                @can('update', $article)
                    <a href="{{ route('artigos.edit', $article) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">Editar</a>
                @endcan
                @can('delete', $article)
                    <form action="{{ route('artigos.destroy', $article) }}" method="POST" onsubmit="return confirm('Tem certeza?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Excluir</button>
                    </form>
                @endcan
            </div>
        </div>
    </article>
</div>
@endsection