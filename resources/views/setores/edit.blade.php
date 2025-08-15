<x-guest-layout>
    <div class="pt-4 bg-gray-100">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div>
                <a href="/">
                    <x-authentication-card-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-2xl mt-6 px-6 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <h1 class="text-2xl font-bold text-center text-gray-800 mb-8">
                    Editar Setor
                </h1>

                <form action="{{ route('setores.update', $setor) }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="nome" class="block text-sm font-medium text-gray-700">Nome do Setor:</label>
                        <input type="text" name="nome" id="nome"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            value="{{ old('nome', $setor->nome) }}" required>
                        @error('nome')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição:</label>
                        <textarea name="descricao" id="descricao" rows="5"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('descricao', $setor->descricao) }}</textarea>
                        @error('descricao')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="imagem" class="block text-sm font-medium text-gray-700">Nova Imagem (opcional):</label>
                        <input type="file" name="imagem" id="imagem" accept="image/*"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-refop/10 file:text-refop hover:file:bg-refop/20">
                        @error('imagem')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror

                        @if ($setor->imagem)
                            <div class="mt-4">
                                <p class="text-sm font-medium text-gray-500 mb-2">Imagem Atual:</p>
                                <img src="{{ asset('storage/' . $setor->imagem) }}" alt="Imagem atual do {{ $setor->nome }}" class="rounded-md max-w-xs max-h-48 object-cover">
                            </div>
                        @endif
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('setores.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 active:bg-gray-900 disabled:opacity-25 transition mr-4">
                            Cancelar
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-refop border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-refopClaro active:bg-refopClaro focus:outline-none focus:border-refopClaro focus:ring focus:ring-refopClaro disabled:opacity-25 transition">
                            Atualizar Setor
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>