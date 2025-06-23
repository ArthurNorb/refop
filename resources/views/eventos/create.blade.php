@extends('layouts.app')

@section('title', 'REFOP - Criar Novo Evento')

@section('content')
<div class="w-full max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-3xl font-bold text-refopEscuro mb-6">Criar Novo Evento</h1>
    <div class="bg-white p-8 rounded-xl shadow-lg">
        <form action="{{ route('eventos.store') }}" method="POST" enctype="multipart/form-data">
            @include('eventos._form', ['buttonText' => 'Criar Evento'])
        </form>
    </div>
</div>
@endsection