@extends('layouts.app')
@section('title', 'REFOP - Escrever Novo Artigo')

@section('content')
<div class="w-full max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-3xl font-bold text-refopEscuro mb-6">Escrever Novo Artigo</h1>
    <div class="bg-white p-8 rounded-xl shadow-lg">
        <form action="{{ route('artigos.store') }}" method="POST" enctype="multipart/form-data">
            @include('artigos._form', ['buttonText' => 'Publicar Artigo'])
        </form>
    </div>
</div>
@endsection