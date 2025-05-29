@extends('layouts.app')

@section('title', 'REFOP - Galeria')

@section('content')

    
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">

            <h2 class="text-3xl sm:text-4xl font-bold text-gray-800 text-center mb-10 sm:mb-12">
                Galeria de Fotos
            </h2>
            <div class="max-w-xl mx-auto">
                <div class="mb-8 transform transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-2xl p-5 bg-white">
                    <img src="{{ asset('img/eventos/evento3.jpg') }}" alt="Evento 1"
                        class="w-full h-auto block">
                    Evento 1
                </div>
                <div class="mb-8 transform transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-2xl p-5 bg-white">
                    <img src="{{ asset('img/eventos/evento1.jpg') }}" alt="Evento 2"
                        class="w-full h-auto block">
                    Evento 2
                </div>
                <div class="mb-8 transform transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-2xl p-5 bg-white">
                    <img src="{{ asset('img/eventos/evento2.jpg') }}" alt="Evento 3"
                        class="w-full h-auto block">
                    Evento 3
                </div>
            </div>

        </div>

@endsection
