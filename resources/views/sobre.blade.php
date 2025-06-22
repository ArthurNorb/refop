{{-- resources/views/sobre.blade.php --}}
@extends('layouts.app')

@section('title', 'REFOP - Sobre')

@section('content')

    {{-- Área de visualização do conteúdo --}}
    <div id="view-content" class="bg-white p-6 sm:p-8 rounded-lg shadow-xl mb-8">
        {{-- A classe "prose" aplica todos os estilos.
         "max-w-none" remove a restrição de largura padrão do prose.
         "text-refopEscuro" define a cor base do texto. --}}
        <article class="prose max-w-none text-refopEscuro">
            {!! $sobre->content !!}
        </article>
    </div>

    {{-- Apenas administradores logados verão esta seção --}}
    @auth
        @if (Auth::user()->is_admin)
            <div class="text-right mb-4">
                <button id="edit-button" class="bg-refop hover:bg-refopEscuro text-white font-bold py-2 px-4 rounded">
                    Editar Página
                </button>
            </div>

            {{-- Formulário de edição, inicialmente oculto --}}
            <div id="edit-form" style="display: none;" class="bg-white p-6 sm:p-8 rounded-lg shadow-xl mb-8">
                <form onsubmit="event.preventDefault(); saveContent();">
                    @csrf
                    @method('PUT')

                    <input id="trix-content-input" type="hidden" name="content" value="{{ $sobre->content }}">
                    <trix-editor input="trix-content-input" class="trix-content"></trix-editor>

                    <div class="mt-6 flex justify-end gap-4">
                        <button type="button" id="cancel-button"
                            class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                            Cancelar
                        </button>
                        <button type="submit" id="save-button"
                            class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Salvar Alterações
                        </button>
                    </div>
                </form>
            </div>
        @endif
    @endauth

@endsection
@push('scripts')
    <script>
        @auth
        @if (Auth::user()->is_admin)
            const viewContent = document.getElementById('view-content');
            const editForm = document.getElementById('edit-form');
            const editButton = document.getElementById('edit-button');
            const cancelButton = document.getElementById('cancel-button');

            editButton.addEventListener('click', () => {
                viewContent.style.display = 'none';
                editButton.style.display = 'none';
                editForm.style.display = 'block';
            });

            cancelButton.addEventListener('click', () => {
                viewContent.style.display = 'block';
                editButton.style.display = 'block';
                editForm.style.display = 'none';
            });

            async function saveContent() {
                const saveButton = document.getElementById('save-button');
                saveButton.disabled = true;
                saveButton.innerText = 'Salvando...';

                const content = document.getElementById('trix-content-input').value;
                const token = document.querySelector('input[name="_token"]').value;

                try {
                    // --- LINHA CORRIGIDA ---
                    // Removemos o segundo argumento ['slug' => 'sobre'] da função route()
                    const response = await fetch("{{ route('sobre.update') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token,
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify({
                            _method: 'PUT',
                            content: content
                        })
                    });

                    const result = await response.json();

                    if (response.ok && result.success) {
                        viewContent.innerHTML = content;
                        alert('Página atualizada com sucesso!');
                        cancelButton.click();
                    } else {
                        throw new Error(result.message || 'Ocorreu um erro ao salvar.');
                    }
                } catch (error) {
                    console.error('Erro ao salvar:', error);
                    alert('Falha ao salvar as alterações. Verifique o console para mais detalhes.');
                } finally {
                    saveButton.disabled = false;
                    saveButton.innerText = 'Salvar Alterações';
                }
            }
        @endif
        @endauth
    </script>
@endpush

@push('styles')
    <style>
        /* Estilo para que o Trix ocupe o espaço corretamente */
        .trix-content {
            min-height: 300px;
            background-color: white;
        }
    </style>
@endpush
