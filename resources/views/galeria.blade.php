@extends('layouts.app')

@section('title', 'REFOP - Galeria')

@section('content')

    <h2 class="mt-4 mb-4 text-center">Galeria de Fotos</h2>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <img src="/img/eventos/evento3.jpg" alt="Evento 3" class="img-fluid shadow-sm mb-4">
                <img src="/img/eventos/evento1.jpg" alt="Evento 1" class="img-fluid shadow-sm mb-4">
                <img src="/img/eventos/evento2.jpg" alt="Evento 2" class="img-fluid shadow-sm mb-4">
            </div>
        </div>
    </div>

@endsection
