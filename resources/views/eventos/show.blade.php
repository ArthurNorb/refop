@extends('layouts.app')

@section('title', 'REFOP - ' . $event->title)

@section('content')
<div class="w-full max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    
    @if($event->image_path)
        <img src="{{ Storage::url($event->image_path) }}" alt="Imagem do evento {{ $event->title }}" class="w-full h-auto max-h-96 object-cover rounded-xl mb-8 shadow-lg">
    @endif

    <div class="bg-white p-8 rounded-xl shadow-lg">
        <h1 class="text-4xl font-bold text-refopEscuro mb-4">{{ $event->title }}</h1>
        
        <div class="text-lg text-gray-600 mb-6 space-y-2">
            <p><strong>Data e Horário:</strong> {{ $event->event_datetime->translatedFormat('l, d \d\e F \d\e Y \à\s H:i') }}</p>
            <p><strong>Local:</strong> {{ $event->location_name }}</p>
        </div>

        <div class="prose max-w-none text-gray-800 mb-8 break-words">
            {!! nl2br(e($event->description)) !!}
        </div>

        @if($event->latitude && $event->longitude)
            <h3 class="text-2xl font-semibold text-refopEscuro mb-4">Localização no Mapa</h3>
            <div id="map" class="h-96 w-full rounded-lg shadow-md z-0"></div>
        @endif

        @if(auth()->check() && auth()->user()->is_admin)
            <div class="mt-8 pt-6 border-t flex gap-4">
                <a href="{{ route('eventos.edit', $event) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">Editar</a>
                <form action="{{ route('eventos.destroy', $event) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este evento?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Excluir</button>
                </form>
            </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
@if($event->latitude && $event->longitude)
<script>
    var map = L.map('map').setView([{{ $event->latitude }}, {{ $event->longitude }}], 16);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([{{ $event->latitude }}, {{ $event->longitude }}]).addTo(map)
        .bindPopup('<b>{{ $event->title }}</b><br>{{ $event->location_name }}').openPopup();
</script>
@endif
@endpush