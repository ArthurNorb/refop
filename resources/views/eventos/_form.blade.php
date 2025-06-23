@csrf
<div class="space-y-6">
    <div>
        <label for="title" class="block text-sm font-medium text-gray-700">Título do Evento</label>
        <input type="text" name="title" id="title" value="{{ old('title', $event->title ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
    </div>
    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Descrição Completa</label>
        <textarea name="description" id="description" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>{{ old('description', $event->description ?? '') }}</textarea>
    </div>
    <div>
        <label for="event_datetime" class="block text-sm font-medium text-gray-700">Data e Horário</label>
        <input type="datetime-local" name="event_datetime" id="event_datetime" value="{{ old('event_datetime', isset($event) ? $event->event_datetime->format('Y-m-d\TH:i') : '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
    </div>
    <div>
        <label for="location_name" class="block text-sm font-medium text-gray-700">Nome do Local (Ex: Praça da UFOP)</label>
        <input type="text" name="location_name" id="location_name" value="{{ old('location_name', $event->location_name ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="latitude" class="block text-sm font-medium text-gray-700">Latitude</label>
            <input type="text" name="latitude" id="latitude" value="{{ old('latitude', $event->latitude ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>
        <div>
            <label for="longitude" class="block text-sm font-medium text-gray-700">Longitude</label>
            <input type="text" name="longitude" id="longitude" value="{{ old('longitude', $event->longitude ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>
    </div>
    <p class="text-xs text-gray-500">Para obter as coordenadas, vá ao Google Maps, clique com o botão direito no local e copie os números (ex: -20.3853, -43.5035).</p>
    <div>
        <label for="image" class="block text-sm font-medium text-gray-700">Imagem do Evento (Opcional)</label>
        <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-refop/10 file:text-refop hover:file:bg-refop/20">
        @if(isset($event) && $event->image_path)
            <img src="{{ Storage::url($event->image_path) }}" class="mt-4 h-32 w-auto rounded">
        @endif
    </div>
</div>
<div class="mt-8 text-right">
    <button type="submit" class="bg-refop hover:bg-refopEscuro text-white font-bold py-2 px-6 rounded-lg">{{ $buttonText ?? 'Salvar' }}</button>
</div>