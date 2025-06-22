@extends('layouts.app')

@section('title', 'REFOP - Galeria')

@section('content')

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <h2 class="text-3xl sm:text-4xl font-bold text-gray-800 text-center mb-10 sm:mb-12">
            Galeria de Fotos
        </h2>

        {{-- Formulário de Upload --}}
        @auth
            <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-lg mb-12">
                <h3 class="text-xl font-semibold mb-4 text-gray-700">Adicionar nova foto</h3>
                <form action="{{ route('galeria.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Imagem:</label>
                        <input type="file" name="image" id="image"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required>
                        @error('image')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="caption" class="block text-gray-700 text-sm font-bold mb-2">Legenda (opcional):</label>
                        <input type="text" name="caption" id="caption" placeholder="Ex: Festa de Fim de Ano"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('caption')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="text-right">
                        <button type="submit"
                            class="bg-refop hover:bg-refopEscuro text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Enviar Imagem
                        </button>
                    </div>
                </form>
            </div>
        @endauth

        {{-- Grade da Galeria --}}
        <div class="columns-1 sm:columns-2 md:columns-3 lg:columns-4 gap-6 space-y-6">
            @forelse ($images as $image)
                {{-- A classe 'break-inside-avoid' impede que uma imagem seja cortada ao final de uma coluna --}}
                <div class="relative group bg-white rounded-lg shadow-md overflow-hidden break-inside-avoid">
                    {{-- O link é a chave para o Lightbox funcionar --}}
                    <a href="{{ Storage::url($image->path) }}" data-lightbox="gallery" data-title="{{ $image->caption }}">
                        {{-- IMPORTANTE: h-60 e object-cover foram removidos. h-auto permite que a altura seja natural --}}
                        <img src="{{ Storage::url($image->path) }}" alt="{{ $image->caption }}"
                            class="w-full h-auto block transform transition-transform duration-300 group-hover:scale-110">
                    </a>

                    {{-- Legenda e informações da imagem --}}
                    <div class="p-4">
                        <p class="text-sm text-gray-800 truncate">{{ $image->caption }}</p>
                        <p class="text-xs text-gray-500">Enviado por: {{ $image->user->name }}</p>
                    </div>

                    {{-- Botão de Excluir --}}
                    @if (auth()->check() && (auth()->id() === $image->user_id || auth()->user()->is_admin))
                        <div class="absolute top-2 right-2">
                            <form action="{{ route('galeria.destroy', $image) }}" method="POST"
                                onsubmit="return confirm('Tem certeza que deseja excluir esta imagem?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs leading-none shadow-lg hover:bg-red-700 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            @empty
                <p class="text-center text-gray-500">Ainda não há fotos na galeria. Seja o primeiro a enviar!</p>
            @endforelse
        </div>

        {{-- Links de Paginação --}}
        {{-- A paginação padrão pode não funcionar bem com o layout de colunas. A melhor abordagem seria um "Load More" com JavaScript,
         mas por enquanto, manter os links funciona, embora o layout possa "pular" ao mudar de página. --}}
        <div class="mt-12">
            {{ $images->links() }}
        </div>

    </div>
@endsection