@csrf
<div class="space-y-6">
    <div>
        <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
        <input type="text" name="title" id="title" value="{{ old('title', $article->title ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
    </div>
    <div>
        <label for="excerpt" class="block text-sm font-medium text-gray-700">Resumo (Chamada)</label>
        <textarea name="excerpt" id="excerpt" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>{{ old('excerpt', $article->excerpt ?? '') }}</textarea>
    </div>
    <div>
        <label for="body" class="block text-sm font-medium text-gray-700">Conteúdo do Artigo</label>
        <input id="body" type="hidden" name="body" value="{{ old('body', $article->body ?? '') }}">
        <trix-editor input="body" class="trix-content bg-white"></trix-editor>
    </div>
    <div>
        <label for="image" class="block text-sm font-medium text-gray-700">Imagem de Capa (Opcional)</label>
        <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-refop/10 file:text-refop hover:file:bg-refop/20">
        @if(isset($article) && $article->image_path)
            <img src="{{ Storage::url($article->image_path) }}" class="mt-4 h-32 w-auto rounded">
        @endif
    </div>
</div>
<div class="mt-8 text-right">
    <button type="submit" class="bg-refop hover:bg-refopEscuro text-white font-bold py-2 px-6 rounded-lg">{{ $buttonText ?? 'Salvar' }}</button>
</div>