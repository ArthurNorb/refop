@extends('layouts.app')

@section('title', $republica->nome)

@section('content')
    <div class="w-full sm:max-w-5xl mt-6 px-6 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg">

        <div class="flex flex-col sm:flex-row sm:items-center sm:gap-8">
            @if ($republica->logo)
                <div class="flex-shrink-0 mb-4 sm:mb-0">
                    <img src="{{ asset('storage/' . $republica->logo) }}" alt="Logo da República {{ $republica->nome }}"
                        class="w-32 h-32 object-cover rounded-full shadow-md mx-auto">
                </div>
            @endif

            <div class="text-center sm:text-left">
                <h1 class="text-4xl font-bold text-gray-800 leading-tight">
                    {{ $republica->nome }}
                </h1>
                <p class="text-md text-gray-600 mt-2">
                    {{ $republica->endereco }}
                </p>
                @if ($republica->genero)
                    <div
                        class="mt-2 inline-flex items-center bg-gray-100 text-refop font-semibold px-3 py-1 rounded-full text-sm">
                        {{ ucfirst($republica->genero) }}
                    </div>
                @endif
            </div>
        </div>

        @if ($republica->descricao)
            <div class="mt-8 pt-8 border-t border-gray-200">
                <h2 class="text-xl font-bold text-gray-800 mb-2">Descrição</h2>
                <p class="text-gray-700 whitespace-pre-wrap">{{ $republica->descricao }}</p>
            </div>
        @endif

        <div class="mt-8 pt-8 border-t border-gray-200">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Fotos da República</h2>

            @if ($republica->fotos->isNotEmpty())
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                    @foreach ($republica->fotos as $foto)
                        <div class="relative group">
                            <img src="{{ asset('storage/' . $foto->caminho_foto) }}"
                                alt="Foto da República {{ $republica->nome }}" onclick="openModal(this.src)"
                                class="w-full h-40 object-cover rounded-lg shadow-md transition-transform transform group-hover:scale-105 cursor-pointer">
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600">Esta república ainda não possui fotos.</p>
            @endif
        </div>

        <div class="flex items-center justify-end mt-8 border-t pt-6 border-gray-200">
            <a href="{{ route('republicas.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 disabled:opacity-25 transition mr-4">
                Voltar para a lista
            </a>
            @auth
                @if (Auth::user()->isAdmin())
                    <a href="{{ route('republicas.edit', $republica) }}"
                        class="inline-flex items-center px-4 py-2 bg-refop border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:text-refop hover:border-refop disabled:opacity-25 transition">
                        Editar República
                    </a>
                    <form action="{{ route('republicas.delete', $republica) }}" method="POST"
                        onsubmit="return confirm('ATENÇÃO: Você tem certeza que deseja excluir esta república? Todos os seus dados e fotos serão perdidos permanentemente. Esta ação não pode ser desfeita.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="ml-4 inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition">
                            Excluir
                        </button>
                    </form>
                @endif
            @endauth
        </div>
    </div>

    <div id="imageModal"
        class="hidden fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50 p-4 transition-opacity duration-300"
        onclick="closeModal(event)">
        <span class="absolute top-4 right-6 text-white text-4xl font-bold cursor-pointer hover:text-gray-300"
            onclick="closeModal()">&times;</span>
        <img id="modalImage" src="" alt="Foto Ampliada" class="max-w-full max-h-full object-contain rounded-lg">
    </div>

@endsection

@push('scripts')
    <script>
        const modal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');

        function openModal(imageSrc) {
            modalImage.src = imageSrc;
            modal.classList.remove('hidden');
            window.addEventListener('keydown', handleEscKey);
        }

        function closeModal(event) {
            if (event === undefined || event.target.id === 'imageModal') {
                modal.classList.add('hidden');
                modalImage.src = "";
                window.removeEventListener('keydown', handleEscKey);
            }
        }

        function handleEscKey(event) {
            if (event.key === 'Escape') {
                closeModal();
            }
        }
    </script>
@endpush
