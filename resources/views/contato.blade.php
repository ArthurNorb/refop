@extends('layouts.app')

@section('title', 'REFOP - Contato')

@section('content')

<h2 class="mt-4 mb-4">Fale Conosco</h2>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <form action="#" method="POST">
                <div class="mb-3">
                    <input type="text" name="nome" placeholder="Seu nome" required class="form-control">
                </div>
                <div class="mb-3">
                    <input type="email" name="email" placeholder="Seu e-mail" required class="form-control">
                </div>
                <div class="mb-3">
                    <textarea name="mensagem" rows="5" placeholder="Digite sua mensagem" required class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-azul-escuro w-100">Enviar</button>
            </form>
        </div>
    </div>
</div>

@endsection