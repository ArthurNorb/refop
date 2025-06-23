@extends('layouts.app')

@section('title', 'REFOP - Editar Evento')

@section('content')
<div class="w-full max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-3xl font-bold text-refopEscuro mb-6">Editar Evento</h1>
    <div class="bg-white p-8 rounded-xl shadow-lg">
        <form action="{{ route('eventos.update', $event) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @include('eventos._form', ['buttonText' => 'Atualizar Evento'])
        </form>
    </div>
</div>
@endsection