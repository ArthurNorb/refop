@extends('layouts.app')

@section('title', 'REFOP - Eventos')

@section('content')
<div class="w-full max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <div class="flex flex-col sm:flex-row justify-between items-center mb-8">
        <h2 class="text-3xl font-bold text-refopEscuro mb-4 sm:mb-0">Agenda de Eventos</h2>
        @if(auth()->check() && auth()->user()->is_admin)
            <a href="{{ route('eventos.create') }}" class="bg-refop hover:bg-refopEscuro text-white font-bold py-2 px-4 rounded transition-colors">
                + Adicionar Evento
            </a>
        @endif
    </div>

    <div class="flex justify-center gap-4 mb-10">
        <a href="{{ route('eventos.index') }}" class="px-4 py-2 text-sm font-medium rounded-md {{ !request('filter') ? 'bg-refop text-white' : 'bg-gray-200 text-gray-700' }}">Todos</a>
        <a href="{{ route('eventos.index', ['filter' => 'futuros']) }}" class="px-4 py-2 text-sm font-medium rounded-md {{ request('filter') === 'futuros' ? 'bg-refop text-white' : 'bg-gray-200 text-gray-700' }}">Próximos</a>
        <a href="{{ route('eventos.index', ['filter' => 'passados']) }}" class="px-4 py-2 text-sm font-medium rounded-md {{ request('filter') === 'passados' ? 'bg-refop text-white' : 'bg-gray-200 text-gray-700' }}">Passados</a>
    </div>

    <div class="space-y-6">
        @forelse ($events as $event)
            <a href="{{ route('eventos.show', $event) }}" class="block group bg-white rounded-xl shadow-lg hover:shadow-2xl overflow-hidden border border-gray-200 transition-all duration-300">
                <div class="flex flex-col sm:flex-row items-start">
                    @if($event->image_path)
                    <div class="w-full sm:w-1/3">
                        <img src="{{ Storage::url($event->image_path) }}" alt="Imagem do evento {{ $event->title }}" class="w-full h-48 object-cover">
                    </div>
                    @endif
                    
                    <div class="p-5 sm:p-6 flex-1">
                        {{-- Badge de Status --}}
                        @if($event->event_datetime->isPast())
                            <span class="inline-block bg-gray-500 text-white text-xs font-semibold px-2 py-1 rounded-full mb-3">Realizado</span>
                        @else
                            <span class="inline-block bg-green-500 text-white text-xs font-semibold px-2 py-1 rounded-full mb-3">Próximo</span>
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