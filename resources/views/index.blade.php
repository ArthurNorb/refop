@extends('layouts.app')

@section('title', 'REFOP - Bem-vindo')

@section('content')

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">

        @if ($featuredArticles->isNotEmpty())
            <div class="mb-20">

                <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                    <h2 class="text-4xl font-bold text-refopEscuro mb-8 text-center">Últimas Publicações</h2>
                </div>

                <div class="swiper h-[60vh] max-h-[500px] w-full rounded-2xl">
                    <div class="swiper-wrapper">

                        @foreach ($featuredArticles as $article)
                            <div class="swiper-slide relative text-center text-white"
                                style="background-image: url('{{ Storage::url($article->image_path) }}'); background-size: cover; background-position: center;">

                                <div
                                    class="absolute inset-0 bg-black/50 flex flex-col items-center justify-center p-6 sm:p-8">

                                    <h2 class="text-4xl md:text-5xl font-extrabold drop-shadow-lg flex-shrink-0">
                                        {{ $article->title }}
                                    </h2>

                                    <p
                                        class="text-lg drop-shadow-md my-6 max-w-2xl mx-auto flex-grow overflow-hidden line-clamp-4">
                                        {{ $article->excerpt }}
                                    </p>

                                    <a href="{{ route('artigos.show', $article) }}"
                                        class="inline-block bg-white text-refopEscuro font-bold py-3 px-8 rounded-full shadow-lg hover:bg-gray-200 transition-all text-base flex-shrink-0">
                                        Ler Artigo
                                    </a>

                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 mb-20">

            <div class="lg:col-span-2">
                <h3 class="text-3xl font-bold text-refopEscuro mb-6 border-b-2 border-refop pb-3">Próximos Eventos</h3>
                <div class="space-y-5">
                    @forelse ($upcomingEvents as $event)
                        <a href="{{ route('eventos.show', $event) }}"
                            class="block p-5 bg-white rounded-lg shadow hover:shadow-xl transition-shadow">
                            <p class="font-semibold text-refop text-lg">{{ $event->title }}</p>
                            <p class="text-base text-gray-600">{{ $event->event_datetime->format('d/m/Y \à\s H:i') }} -
                                {{ $event->location_name }}</p>
                        </a>
                    @empty
                        <p class="text-gray-500 pt-4">Nenhum evento programado no momento.</p>
                    @endforelse
                </div>
                <a href="{{ route('eventos.index') }}"
                    class="inline-block mt-8 text-refop font-semibold hover:underline text-lg">Ver todos os eventos
                    &rarr;</a>
            </div>

            <div>
                <h3 class="text-3xl font-bold text-refopEscuro mb-6 border-b-2 border-refop pb-3">Galeria Recente</h3>
                @if ($recentImages->isNotEmpty())
                    <div class="grid grid-cols-3 gap-3">
                        @foreach ($recentImages as $image)
                            <a href="{{ Storage::url($image->path) }}" data-lightbox="homepage-gallery"
                                data-title="{{ $image->caption }}">
                                <img src="{{ Storage::url($image->path) }}"
                                    alt="{{ $image->caption ?? 'Foto da galeria' }}"
                                    class="aspect-square w-full h-full object-cover rounded-md shadow-sm transition-transform hover:scale-105">
                            </a>
                        @endforeach
                    </div>
                    <a href="{{ route('galeria.index') }}"
                        class="inline-block mt-8 text-refop font-semibold hover:underline text-lg">Ver galeria completa
                        &rarr;</a>
                @else
                    <p class="text-gray-500 pt-4">Nenhuma foto na galeria ainda.</p>
                @endif
            </div>
        </div>

        <div class="text-center py-10 border-t border-gray-200">
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                <a href="{{ route('republicas.index') }}"
                    class="w-full sm:w-auto bg-refopEscuro border-hidden text-white font-bold py-3 px-8 rounded-lg shadow-md hover:bg-gray-200 hover:text-refopEscuro hover:border-refopEscuro transition-colors">
                    Conheça as Repúblicas
                </a>
                <a href="{{ route('sobre.show') }}"
                    class="w-full sm:w-auto bg-refopEscuro border-hidden text-white font-bold py-3 px-8 rounded-lg shadow-md hover:bg-gray-200 hover:text-refopEscuro hover:border-refopEscuro transition-colors">
                    Sobre a REFOP
                </a>
                <a href="{{ route('contato.show') }}"
                    class="w-full sm:w-auto bg-refopEscuro border-hidden text-white font-bold py-3 px-8 rounded-lg shadow-md hover:bg-gray-200 hover:text-refopEscuro hover:border-refopEscuro transition-colors">
                    Contato
                </a>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            .swiper {
                --swiper-navigation-color: #ffffff;
                --swiper-pagination-color: #ffffff;
            }

            .swiper-pagination-bullet-inactive {
                opacity: 0.5;
            }

            .swiper-button-next,
            .swiper-button-prev {
                filter: drop-shadow(0 1px 2px rgba(0, 0, 0, 0.5));
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            const swiper = new Swiper('.swiper', {
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        </script>
    @endpush
@endsection
