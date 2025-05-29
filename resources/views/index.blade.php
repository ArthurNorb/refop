@extends('layouts.app')

@section('title', 'REFOP - Início')

@section('content')

    <div class="w-full max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 mb-auto">

        <h2 class="mb-6 text-2xl font-semibold text-refopEscuro">Atualizações Recentes</h2>

        <div class="space-y-6">

            <div class="group bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                <div class="pt-5 px-5 pb-5 sm:pt-6 sm:px-6 sm:pb-6 group-hover:pb-10 sm:group-hover:pb-12 transition-all duration-300 ease-in-out">
                    <h3 class="text-xl font-semibold text-refop mb-2">
                        <a href="#" class="no-underline hover:text-refopEscuro transition-colors duration-150">
                            Prestação de contas - Março 2025
                        </a>
                    </h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        O documento de prestação de contas está disponível para visualização.
                    </p>
                </div>
            </div>

            <div class="group bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                <div class="pt-5 px-5 pb-5 sm:pt-6 sm:px-6 sm:pb-6 group-hover:pb-10 sm:group-hover:pb-12 transition-all duration-300 ease-in-out">
                    <h3 class="text-xl font-semibold text-refop mb-2">
                        <a href="#" class="no-underline hover:text-refopEscuro transition-colors duration-150">
                            Solicitação de evento - Festa das Luzes
                        </a>
                    </h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Repúblicas interessadas devem preencher o formulário até 30/04.
                    </p>
                </div>
            </div>

        </div>
    </div>

@endsection
