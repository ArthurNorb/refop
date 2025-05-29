@extends('layouts.app')

@section('title', 'REFOP - Repúblicas')

@section('content')

    <div class="w-full max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 mb-auto">

        <h2 class="mb-6 text-2xl font-semibold text-refopEscuro">Repúblicas Federais</h2>

        <div class="space-y-6">

            <div class="group bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                <div class="pt-5 px-5 pb-5 sm:pt-6 sm:px-6 sm:pb-6 group-hover:pb-10 sm:group-hover:pb-12 transition-all duration-300 ease-in-out">
                    <h3 class="text-xl font-semibold text-refop mb-2">
                        <a href="#" class="no-underline hover:text-refopEscuro transition-colors duration-150">
                            República Liberdade
                        </a>
                    </h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Endereço: Rua das Repúblicas, 123 - Ouro Preto
                    </p>
                </div>
            </div>

            <div class="group bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                <div class="pt-5 px-5 pb-5 sm:pt-6 sm:px-6 sm:pb-6 group-hover:pb-10 sm:group-hover:pb-12 transition-all duration-300 ease-in-out">
                    <h3 class="text-xl font-semibold text-refop mb-2">
                        <a href="#" class="no-underline hover:text-refopEscuro transition-colors duration-150">
                            República Esperança
                        </a>
                    </h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Endereço: Rua São José, 456 - Ouro Preto
                    </p>
                </div>
            </div>

        </div>
    </div>

@endsection
