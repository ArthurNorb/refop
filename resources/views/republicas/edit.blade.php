<x-guest-layout>
    <div class="pt-4 bg-refop">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div>
                <a href="/">
                    <x-authentication-card-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-5xl mt-6 px-6 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <h1 class="text-2xl font-bold text-center text-gray-800 mb-8">
                    Editando República: {{ $republica->nome }}
                </h1>

                <form action="{{ route('republicas.update', $republica) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label for="nome" class="block text-sm font-medium text-gray-700">Nome da República:</label>
                        <input type="text" name="nome" id="nome"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                               value="{{ old('nome', $republica->nome) }}" required>
                        @error('nome') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="endereco" class="block text-sm font-medium text-gray-700">Endereço:</label>
                        <input type="text" name="endereco" id="endereco"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                               value="{{ old('endereco', $republica->endereco) }}" required>
                        @error('endereco') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="genero" class="block text-sm font-medium text-gray-700">Gênero da República:</label>
                        <select name="genero" id="genero" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="masculina" {{ old('genero', $republica->genero) == 'masculina' ? 'selected' : '' }}>Masculina</option>
                            <option value="feminina" {{ old('genero', $republica->genero) == 'feminina' ? 'selected' : '' }}>Feminina</option>
                            <option value="mista" {{ old('genero', $republica->genero) == 'mista' ? 'selected' : '' }}>Mista</option>
                        </select>
                        @error('genero') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição:</label>
                        <textarea name="descricao" id="descricao" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('descricao', $republica->descricao) }}</textarea>
                        @error('descricao') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="logo" class="block text-sm font-medium text-gray-700">Logo (opcional, envie um novo para substituir):</label>
                        @if ($republica->logo)
                            <div class="my-2">
                                <img src="{{ asset('storage/' . $republica->logo) }}" alt="Logo atual" class="h-20 w-20 object-cover rounded-md">
                            </div>
                        @endif
                        <input type="file" name="logo" id="logo" accept="image/*" class="mt-1 block w-full text-gray-700">
                        @error('logo') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="pt-4 border-t">
                        <label for="fotos" class="block text-sm font-medium text-gray-700">Adicionar Novas Fotos:</label>
                        <input type="file" name="fotos[]" id="fotos" multiple accept="image/*" class="mt-1 block w-full text-gray-700">
                        @error('fotos.*') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    
                        @if ($republica->fotos->isNotEmpty())
                            <div class="mt-6">
                                <p class="text-sm font-medium text-gray-700 mb-2">Gerenciar Fotos Atuais:</p>
                                <div class="grid grid-cols-4 sm:grid-cols-6 md:grid-cols-8 gap-3">
                                    @foreach($republica->fotos as $foto)
                                        <div class="relative group">
                                            <img src="{{ asset('storage/' . $foto->caminho_foto) }}" alt="Foto atual" class="h-24 w-24 object-cover rounded-md">
                                            <button type="button" onclick="confirmAndDelete({{ $foto->id }})" class="absolute -top-2 -right-2 bg-red-600 text-white rounded-full h-6 w-6 flex items-center justify-center text-xs font-bold hover:bg-red-800 transition-all opacity-0 group-hover:opacity-100">
                                                X
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>


                    <div class="flex items-center justify-end pt-4 border-t border-gray-200">
                        <a href="{{ route('republicas.show', $republica) }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 disabled:opacity-25 transition mr-4">
                            Cancelar
                        </a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-refop border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-refopClaro disabled:opacity-25 transition">
                            Salvar Alterações
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @foreach($republica->fotos as $foto)
        <form id="delete-form-{{ $foto->id }}" action="{{ route('republicas.fotos.destroy', $foto) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    @endforeach

    <script>
        function confirmAndDelete(photoId) {
            if (confirm('Tem certeza que deseja excluir esta foto?')) {
                document.getElementById('delete-form-' + photoId).submit();
            }
        }
    </script>
</x-guest-layout>