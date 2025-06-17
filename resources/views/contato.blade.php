@extends('layouts.app')

@section('title', 'REFOP - Contato')

@section('content')

    <div class="max-w-xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-semibold text-refopEscuro mb-8 text-center">Fale Conosco</h2>

        <div class="bg-white p-6 sm:p-8 rounded-xl shadow-2xl">

            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded" role="alert">
                    <p class="font-bold">Sucesso!</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded" role="alert">
                    <p class="font-bold">Ocorreram alguns erros:</p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('contato.send') }}" method="POST">
                @csrf

                <div class="mb-5">
                    <label for="nome" class="font-semibold text-gray-800">Seu nome</label>
                    <input type="text" name="nome" id="nome" placeholder="Seu nome completo" required
                        value="{{ old('nome') }}"
                        class="block w-full mt-1 px-4 py-3 rounded-lg border-gray-300 shadow-sm focus:border-refop focus:ring focus:ring-refop focus:ring-opacity-50 text-gray-900 placeholder-gray-500">
                </div>

                <div class="mb-5">
                    <label for="identificacao" class="font-semibold text-gray-800">Matrícula</label>
                    <input type="text" name="identificacao" id="identificacao" value="{{ old('identificacao') }}"
                        placeholder="Sua identificação (ex: Matrícula XX.X.XXXX)" required
                        class="block w-full mt-1 px-4 py-3 rounded-lg border-gray-300 shadow-sm focus:border-refop focus:ring focus:ring-refop focus:ring-opacity-50 text-gray-900 placeholder-gray-500">
                </div>

                <div class="mb-5">
                    <label for="telefone" class="font-semibold text-gray-800">Telefone</label>
                    <input type="tel" name="telefone" id="telefone" placeholder="Seu telefone (ex: (12) 93456-7890)"
                        value="{{ old('telefone') }}" required
                        class="block w-full mt-1 px-4 py-3 rounded-lg border-gray-300 shadow-sm focus:border-refop focus:ring focus:ring-refop focus:ring-opacity-50 text-gray-900 placeholder-gray-500">
                </div>

                <div class="mb-5">
                    <label for="email" class="font-semibold text-gray-800">Email</label>
                    <input type="email" name="email" id="email" placeholder="Seu e-mail (ex: exemplo@refop.com.br)"
                        value="{{ old('email') }}" required
                        class="block w-full mt-1 px-4 py-3 rounded-lg border-gray-300 shadow-sm focus:border-refop focus:ring focus:ring-refop focus:ring-opacity-50 text-gray-900 placeholder-gray-500">
                </div>

                <div class="mb-5">
                    <label for="mensagem" class="font-semibold text-gray-800">Digite sua mensagem</label>
                    <textarea name="mensagem" id="mensagem" rows="5" placeholder="Digite sua mensagem" required
                        class="block w-full mt-1 px-4 py-3 rounded-lg border-gray-300 shadow-sm focus:border-refop focus:ring focus:ring-refop focus:ring-opacity-50 text-gray-900 placeholder-gray-500">{{ old('mensagem') }}</textarea>
                </div>

                <div>
                    <button type="submit"
                        class="w-full font-semibold inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-lg shadow-sm text-base text-white bg-refop hover:bg-refopEscuro focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-refop transition-colors duration-150 ease-in-out">
                        Enviar Mensagem
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
