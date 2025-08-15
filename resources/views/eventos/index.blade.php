@extends('layouts.app')

@section('title', 'REFOP - Eventos')

@section('content')
    <div class="w-full max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8 gap-4">
            <h2 class="text-3xl font-bold text-refopEscuro">Agenda de Eventos</h2>
            
            <div class="flex items-center gap-4">
                <form action="{{ route('eventos.index') }}" method="GET"
                    class="flex items-center gap-2 bg-white p-1 rounded-md border shadow-sm">
                    <select name="filter" id="filter" class="border-none focus:ring-0 text-sm text-gray-600">
                        <option value="">Todos os Eventos</option>
                        <option value="futuros" {{ request('filter') == 'futuros' ? 'selected' : '' }}>Próximos Eventos</option>
                        <option value="passados" {{ request('filter') == 'passados' ? 'selected' : '' }}>Eventos Passados</option>
                    </select>

                    <button type="submit"
                        class="px-3 py-1 bg-refop text-white text-xs font-semibold uppercase rounded hover:bg-refopClaro transition">Filtrar</button>

                    @if (request('filter'))
                        <a href="{{ route('eventos.index') }}"
                            class="px-3 py-1 bg-gray-200 text-gray-700 text-xs font-semibold uppercase rounded hover:bg-gray-300 transition">Limpar</a>
                    @endif
                </form>

                @if (auth()->check() && auth()->user()->is_admin)
                    <a href="{{ route('eventos.create') }}"
                        class="bg-refop hover:bg-refopEscuro text-white font-bold py-2 px-4 rounded transition-colors flex-shrink-0">
                        + Adicionar
                    </a>
                @endif
            </div>
        </div>

        <div class="space-y-6">
            @forelse ($events as $event)
                <a href="{{ route('eventos.show', $event) }}"
                    class="block group bg-white rounded-xl shadow-lg hover:shadow-2xl overflow-hidden border border-gray-200 transition-all duration-300">
                    <div class="flex flex-col sm:flex-row items-start">
                        @if ($event->image_path)
                            <div class="w-full sm:w-1/3">
                                <img src="{{ Storage::url($event->image_path) }}" alt="Imagem do evento {{ $event->title }}"
                                    class="w-full h-48 object-cover">
                            </div>
                        @endif

                        <div class="p-5 sm:p-6 flex-1">
                            @if ($event->event_datetime->isPast())
                                <span
                                    class="inline-block bg-gray-500 text-white text-xs font-semibold px-2 py-1 rounded-full mb-3">Realizado</span>
                            @else
                                <span
                                    class="inline-block bg-green-500 text-white text-xs font-semibold px-2 py-1 rounded-full mb-3">Próximo</span>
                            @endif

                            <h3 class="text-xl font-semibold text-refop mb-2 group-hover:text-refopEscuro">
                                {{ $event->title }}
                            </h3>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                <strong>Data:</strong> {{ $event->event_datetime->format('d/m/Y \à\s H:i') }}
                            </p>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                <strong>Local:</strong> {{ $event->location_name }}
                            </p>
                        </div>
                    </div>
                </a>
            @empty
                <p class="text-center text-gray-500 py-10">Nenhum evento encontrado para este filtro.</p>
            @endforelse
        </div>
    </div>
@endsection