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
                    Adicionar Nova República
                </h1>

                <form action="{{ route('republicas.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf

                    <div>
                        <label for="nome" class="block text-sm font-medium text-gray-700">Nome da República:</label>
                        <input type="text" name="nome" id="nome"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            value="{{ old('nome') }}" required>
                        @error('nome')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="endereco" class="block text-sm font-medium text-gray-700">Endereço:</label>
                        <input type="text" name="endereco" id="endereco"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            value="{{ old('endereco') }}" required>
                        @error('endereco')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="genero" class="block text-sm font-medium text-gray-700">Gênero da
                            República:</label>
                        <select name="genero" id="genero" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="" disabled {{ old('genero') ? '' : 'selected' }}>Selecione uma opção
                            </option>
                            <option value="masculina" {{ old('genero') == 'masculina' ? 'selected' : '' }}>Masculina
                            </option>
                            <option value="feminina" {{ old('genero') == 'feminina' ? 'selected' : '' }}>Feminina
                            </option>
                            <option value="mista" {{ old('genero') == 'mista' ? 'selected' : '' }}>Mista</option>
                        </select>
                        @error('genero')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição:</label>
                        <textarea name="descricao" id="descricao" rows="5"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('descricao') }}</textarea>
                        @error('descricao')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="logo" class="block text-sm font-medium text-gray-700">Logo (opcional):</label>
                        <input type="file" name="logo" id="logo" accept="image/*"
                            class="mt-1 block w-full text-gray-700">
                        @error('logo')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="fotos" class="block text-sm font-medium text-gray-700">Fotos da República
                            (opcional, múltiplas):</label>
                        <input type="file" name="fotos[]" id="fotos" multiple accept="image/*"
                            class="mt-1 block w-full text-gray-700">
                        @error('fotos')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('republicas.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 active:bg-gray-900 disabled:opacity-25 transition mr-4">
                            Voltar
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-refop border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-refopClaro active:bg-refopClaro focus:outline-none focus:border-refopClaro focus:ring focus:ring-refopClaro disabled:opacity-25 transition">
                            Adicionar República
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
